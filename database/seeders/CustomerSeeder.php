<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create 25 regular customers
         Customer::factory()
            ->count(25)
            ->create();

        // Create 5 customers with notes
        Customer::factory()
            ->withNotes()
            ->count(5)
            ->create();

        // Create 3 inactive customers
        Customer::factory()
            ->inactive()
            ->count(3)
            ->create();

        // Create some specific customers for testing
        Customer::factory()->create([
             'first_name' => 'John',
             'surname' => 'Doe',
             'contact_number' => '246-555-0001',
             'email_address' => 'john.doe@email.com',
             'parish' => 'Bridgetown',
             'notes' => 'VIP Customer - owns 3 vehicles',
        ]);

        Customer::factory()->create([
            'first_name' => 'Maria',
            'surname' => 'Johnson',
            'contact_number' => '246-555-0002',
            'email_address' => 'maria.j@gmail.com',
            'parish' => 'St. Michael',
            'preferred_contact_method' => 'email',
        ]);
    }
}
