<?php 

namespace App\Traits;

use Illuminate\Http\Request;

/**
 * 
 */
trait AutoComplete{

    /*
    * Get the model, searchFields, selectFields, status
    */
    abstract protected function getConfig() : array;

    /*
     * API endpoint to fetch data from database
     * for autocomplete text inputs
     */
    public function search(Request $request){
        
        //retrieve query value from frontend
        $query = $request->get('query');

        
        if (strlen($query) < 2) {
            return response()->json([]);
        }

         //get config details for query
         $config = $this->getConfig();
         $model = $config['model'];
         $searchFields= $config['searchFields'];
         $selectFields= $config['selectFields'];
         $status = $config['status']; // used to set 'is_active'

         $results = $model::where('is_active', true)
            ->where(function($q) use ($query, $searchFields) {
                foreach ($searchFields as $index => $field) {
                    if ($index === 0) {
                        //first field uses where
                        $q->where($field, 'like', "%{$query}%");
                    } else {
                        
                        $q->orWhere($field, 'like', "%{$query}%");
                    }
                }
                
                // account for concatenated fields
                if (count($searchFields) > 1) {
                    $concat = "CONCAT(" . implode(", ' ', ", $searchFields) . ")"; //format searchFields for query
                    $q->orWhereRaw("{$concat} LIKE ?", ["%{$query}%"]);
                }
            })
            ->select($selectFields)
            ->limit(10)
            ->get();
        
        return response()->json($results);
    }
}