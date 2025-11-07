<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Fetch Job Records with Technician
        $jobs = Job::with('technicianUser') 
        ->orderBy('created_at','asc')
        -> paginate(15);

        return view('jobs.index',compact(
            'jobs'
        ));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

        $job = Job::with('vehicle','customer','services')->findOrFail($id);

        return view('jobs.show', compact(
            'job'
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
