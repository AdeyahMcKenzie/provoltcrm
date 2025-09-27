<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Customer;
use App\Models\User;
use App\Models\Vehicle;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Create 30 random jobs
        Job::factory()->count(30)->create();

        // Create a specific test job
        Job::factory()->create([
            'registration_number' => 'AP87',
            'customer_id' => Customer::first()->customer_id,
            'technician' => User::first()->employee_id,
            'date' => now(),
            'status' => 'scheduled',
        ]);
    }
}
