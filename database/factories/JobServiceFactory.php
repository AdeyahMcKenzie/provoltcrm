<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Job;
use App\Models\Service;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // pick a random job and service 
        $job = Job::inRandomOrder()->first();
        $service = Service::inRandomOrder()->first();

        return [
            'job_id' => $job ? $job->job_id : Job::factory(), // fallback: create one if none exist
            'service_id' => $service ? $service->service_id : Service::factory(), // fallback too
            'service_price' => $service ? $service->service_price : $this->faker->randomFloat(2, 50, 500),
            'quantity' => null,//set in the seeder
            'created_at'=> now(),
        ];
    }
}
