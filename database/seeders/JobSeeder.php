<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Vehicle;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
        
        //fetch all vehicles
        $vehicles = Vehicle::all();

        //assign a random number of jobs to each vehicle ( maintains the integrity of relationships in the database)
        foreach ($vehicles as $vehicle) {
            Job::factory()->count(rand(1, 5))->create([
                'registration_number' => $vehicle->registration_number, // fetch registration number from vehicle table
                'customer_id' => $vehicle->owner_id // fetch customer id from vehicle table
            ]);
        }
       

       
    }
}
