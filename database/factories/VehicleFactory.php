<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //create my own make model faker
        $vehicles = [
            ['make' => 'Toyota', 'model' => 'Corolla'],
            ['make' => 'Isuzu', 'model' => 'Dmax'],
            ['make' => 'Honda', 'model' => 'Civic'],
            ['make' => 'Nissan', 'model' => 'Sentra'],
            ['make' => 'Mazda', 'model' => '3'],
            ['make' => 'Hyundai', 'model' => 'Tucson'],
            ['make' => 'Kia', 'model' => 'Sportage'],
            ['make' => 'Ford', 'model' => 'Ranger'],
            ['make' => 'BMW', 'model' => '3 Series'],
            ['make' => 'Mercedes-Benz', 'model' => 'C-Class'],
        ];

        //select random element for vehicle
        $vehicle = $this->faker->randomElement($vehicles);

        return [
            'registration_number' => $this->faker->regexify('[A-Z]{1,2}[0-9]{1,4}'),//randomly generate vehicle registration numbers
            'owner_id' => null, //value is set in the model
            'make' => $vehicle['make'],
            'model' => $vehicle['model'],
            'description' => $this->faker->randomElement([
                'Well maintained vehicle',
                'Recently serviced',
                'Minor scratches on exterior',
                'Single owner, no accidents',
                'Dealer maintained',
                'Needs interior detailing',
                'Low mileage, great condition',
                'Engine and transmission in good shape',
            ]),//might remove this field later
            'year' => $this->faker->numberBetween(2000, now()->year - 1),
            'colour' => $this->faker->randomElement(['black','silver','red','white','grey','orange','blue']),
            'vin_number' => strtoupper($this->faker->regexify('[A-HJ-NPR-Z0-9]{17}')),
            'engine_type' =>  $this->faker->randomElement([
                'Inline-4', 'V6', 'V8', 'Electric', 'Hybrid', 'Diesel'
            ]),//might also remove this field
            'mileage' => $this->faker->randomNumber(5,true),
            'fuel_type' => $this->faker->randomElement(['petrol','diesel','hybrid','electric']),
            'transmission' => $this->faker->randomElement(['automatic','manual']),
            'is_active' => true,
            'created_by' => User::inRandomOrder()->first()?->employee_id, //select random staff member as creator of this entry

        ];
    }

}
