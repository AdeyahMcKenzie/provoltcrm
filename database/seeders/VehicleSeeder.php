<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\Customer;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     //create 30 vehicles 
    public function run(): void
    {
        //fetch all customers
        $customers = Customer::all();

        //assign a random number of vehicles to each customer
        foreach ($customers as $customer) {
            Vehicle::factory()
            ->count(rand(1, 3))
            ->create([
                'owner_id' => $customer->customer_id,
            ]);
        }

       

        
    }
}
