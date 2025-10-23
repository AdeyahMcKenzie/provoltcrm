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
        //
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
