<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Customer;


class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

         //Get vehicles from database, 15 at a time
         $vehicles = Vehicle::with('owner')  //all with owner function from model
         ->orderBy('owner_id', 'ASC')  
         ->paginate(15);  // Show 15 per page

        // render the view with vehicle data 
        return view('vehicles.index', compact(
            'vehicles'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate input
        $validated = $request->validate([
            'registration_number' => 'bail|required|string|unique:vehicles,registration_number',
            'owner_id' => 'required|integer|exists:customers,customer_id',
            'make' => 'required|string|max:2000',
            'model' => 'required|string|string',
            'description' => 'nullable|string',
            'year' => 'required|integer|between:1920,' . date('Y'), //a year between 1920 and the current year
            'colour' => 'nullable|string',
            'vin_number' => 'nullable|string',
            'engine_type' => 'required|string',
            'mileage' => 'nullable|integer',
            'fuel_type' => 'required|in:petrol,diesel,electric',
            'transmission' => 'required|in:automatic,manual',
        ]);
    
        $validated['is_active'] = true;
        $validated['created_by'] = auth()->user()->employee_id;
    
        //Create vehicle record
        $vehicle = Vehicle::create($validated);
    
        //redirect to the "show" route
        return redirect()->route('vehicles.show', $vehicle) 
           ->with('success', 'Vehicle added successfully!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         // get vehicle record
         $vehicle = Vehicle::with('owner')->findOrFail($id);

         // Debug: Check what we got
        logger('Vehicle found: ' . $vehicle->registration_number);
    
        // get related jobs
        $jobs = $vehicle->jobs()
        ->orderBy('created_at', 'desc')
        ->paginate(10);


        // render view
        return view('vehicles.show', compact(
            'vehicle',
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
