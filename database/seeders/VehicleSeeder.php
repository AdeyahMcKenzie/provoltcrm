<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     //create 30 vehicles 
    public function run(): void
    {
        Vehicle::factory()
        ->count(30)
        ->create();

        
    }
}
