<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vehicle;
use App\Models\Customer;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration_number' => Vehicle::inRandomOrder()->first()?->registration_number,
            'customer_id' => Customer::inRandomOrder()->first()?->customer_id,
            'technician' => User::inRandomOrder()->first()?->employee_id,
            'date' => $this->faker->date(),
            'visit_number' => $this->faker->numberBetween(1, 5),
            'status' => $this->faker->randomElement(['scheduled', 'in_progress', 'completed', 'cancelled']),
            'completion_date' => $this->faker->optional()->date(),
            'customer_complaint' => $this->faker->optional()->sentence(8),
            'diagnosis_notes' => $this->faker->optional()->sentence(12),
            'resolution_notes' => $this->faker->optional()->sentence(10),
            'total_cost' => $this->faker->randomFloat(2, 100, 5000),
            'mileage_at_visit' => $this->faker->numberBetween(1000, 200000),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high', 'urgent']),
            'customer_parts_provided' => $this->faker->optional()->sentence(6),
            'created_by' => User::inRandomOrder()->first()?->employee_id,
        ];
    }
}
