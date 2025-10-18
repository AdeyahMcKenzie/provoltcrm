<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\User; //needed so that customer can reference employee_id

class CustomerFactory extends Factory
{
    public function definition(): array
    {
        // This is the "recipe" for creating fake customers
        return [
            'first_name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'contact_number' => '246-' . $this->faker->numerify('###-####'), // Barbados format
            'email_address' => $this->faker->unique()->safeEmail(),
            'street_address' => $this->faker->streetAddress(),
            'province'=> $this->faker->randomElement(['Fitts Village', 'Bridgetown', 'The Ivy', 'Holders Hill', 'Parish Land', 'The Glebe']),
            'parish' => $this->faker->randomElement(['St.Andrew', 'St.Peter', 'St.Michael', 'Christ Church', 'St.James', 'St.Phillip']),
            'alternative_contact' => '246-' . $this->faker->numerify('###-####'),
            'preferred_contact_method' => $this->faker->randomElement(['phone', 'email', 'sms']),
            'notes' => $this->faker->optional(0.3)->sentence(), // 30% chance of having notes
            'is_active' => true,
            'created_by' => User::inRandomOrder()->first()?->employee_id, // Random staff member
        ];
    }

    // Special variations of customers
    public function inactive()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_active' => false,
            ];
        });
    }

    public function withNotes()
    {
        return $this->state(function (array $attributes) {
            return [
                'notes' => 'Regular customer - very satisfied with service',
            ];
        });
    }
}