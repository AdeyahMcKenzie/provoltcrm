<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'employee_id' => 'EMP001',
            'email' => 'johnsmith@provoltcrm.com',
            'password' => Hash::make('password'),
            'first_name' => 'John',
            'surname' => 'Smith',
            'role' => 'admin',
            'phone' => '246-555-0001',
            'is_active' => true,
            'can_edit' => true,
            'can_delete' => true,
            'hire_date' => now()->subDays(365),
        ]);

        DB::table('users')->insert([
            'employee_id' => 'EMP002',
            'email' => 'sarahjohnson@provoltcrm.com',
            'password' => Hash::make('password'),
            'first_name' => 'Sarah',
            'surname' => 'Johnson',
            'role' => 'manager',
            'phone' => '246-555-0002',
            'is_active' => true,
            'can_edit' => true,
            'can_delete' => false,
        ]);

        DB::table('users')->insert([
            'employee_id' => 'EMP003',
            'email' => 'mikewilliams@provoltcrm.com',
            'password' => Hash::make('password'),
            'first_name' => 'Mike',
            'surname' => 'Williams',
            'role' => 'technician',
            'phone' => '246-555-0003',
            'is_active' => true,
            'can_edit' => false,
            'can_delete' => false,
        ]);
    }
}
