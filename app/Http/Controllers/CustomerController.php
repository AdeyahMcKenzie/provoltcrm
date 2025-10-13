<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Get customers from database, 15 at a time
        $customers = Customer::where('is_active', true)  // Only get active customers
                            ->orderBy('customer_id', 'ASC')  
                            ->paginate(15);  // Show 15 per page
        
        // render the view with customer data 
        return view('customers.index', [
            'customers' => $customers //pass directly as the variable $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get customer records along with vehicle and job records.
        $customer = Customer::with('vehicles')->findOrFail($id);
            
        //load in order of most recent with pagination 
        $jobs = $customer -> jobs()
                ->orderBy('created_at', 'desc')
                ->paginate(10);


        return view('customers.show', compact(
            'customer',
            'jobs'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
