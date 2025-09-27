<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $services = [
            'Oil Change',
            'Brake Service',
            'Tire Rotation',
            'Battery Replacement',
            'Wheel Alignment',
            'AC Repair',
            'Engine Tune-up',
            'Transmission Service',
            'Diagnostics Check',
            'Suspension Repair',
        ];

        
    
        return [
            'service_name' => $this->faker->unique()->randomElement($services),
            'service_price' => $this->faker->randomFloat(2, 50, 500),
            'description' => $this->faker->sentence(),
            'category' => $this->faker->randomElement(['Repair', 'Maintenance', 'Inspection']),
            'estimated_time_hours' => $this->faker->randomFloat(1, 0.5, 5),
            'is_active' => true,
            'warranty_period_days' => $this->faker->numberBetween(30, 365),
        ];
    }


}
