<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobService;
use App\Models\Job;
use App\Models\Service;


class JobServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     
    public function run(): void
    {
        //get all jobs and services 
        $jobs = Job::all();
        $services = Service::all();

        //error handling
        if ($jobs->isEmpty() || $services->isEmpty()) {
            $this->command->warn('⚠️ No jobs or services found — skipping.');
            return;
        }

        foreach ($jobs as $job) {
            // pick 3 services (unique)
            $jobServices = $services->shuffle()->take(rand(1, 3));

            foreach ($jobServices as $service) {
                JobService::create([
                    'job_id'        => $job->job_id,
                    'service_id'    => $service->service_id,
                    'service_price' => $service->service_price,
                    'quantity'      => 1, // fixed quantity
                    'start_time'    => now(),
                ]);
            }
        }

       

        
    }
}
