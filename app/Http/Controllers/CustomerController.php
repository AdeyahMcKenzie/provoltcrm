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
           //Validate input
        $validated = $request->validate([
            'first_name'   => 'required|string|max:255',
            'surname'     => 'required|string|max:255',
            'notes'       => 'nullable|string|max:2000',
            'street_address'      => 'nullable|string|max:255',
            'province'    => 'nullable|string|max:255',
            'parish'      => 'nullable|string',
            'email_address'       => 'nullable|email|max:255',
            'contact_number'     => 'required|string|max:20',
            'alternative_contact'    => 'nullable|string|max:20',
            'preferred_contact_method'   => 'nullable|in:email,phone',
        ]);

        $validated['is_active'] = true;
        $validated['created_by'] = auth()->user()->employee_id;

        //Create customer record
        $customer = Customer::create($validated);

        //redirect to the "show" route
        return redirect()->route('customers.show', $customer)
                         ->with('success', 'Customer created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get customer records along with vehicle records.
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
        //Get customer record
        $customer = Customer::findOrFail($id);
            

        //return the edit view 
        return view('customers.edit', compact(
            'customer'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Get customer record
        $customer = Customer::findOrFail($id);

        $validated = $request->validate([
            'first_name'   => 'required|string|max:255',
            'surname'     => 'required|string|max:255',
            'notes'       => 'nullable|string|max:2000',
            'street_address'      => 'nullable|string|max:255',
            'province'    => 'nullable|string|max:255',
            'parish'      => 'nullable|string',
            'email_address'       => 'nullable|email|max:255',
            'contact_number'     => 'required|string|max:20',
            'alternative_contact'    => 'nullable|string|max:20',
            'preferred_contact_method'   => 'required|in:email,phone',
            'is_active' => 'required|boolean',
        ]);

        // Mass update
        $customer->update($validated);

        //redirect to the "show" route
        return redirect()->route('customers.show', $customer)
                         ->with('success', 'Customer created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    /**
     *  Archive  customer records
     */
    public function archive(string $id)
    {
        //Get customer record
        $customer = Customer::findOrFail($id);

        //Change customer status
        $customer->is_active = false;
    
        //Update the database
        $customer->save();
    
        //Redirect to index
        return redirect()->route('customers.index')
                    ->with('success', 'Customer archived successfully!');

    }
}
