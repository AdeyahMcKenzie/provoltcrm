<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;

    protected $primaryKey = 'registration_number';
    public $incrementing = false; // Since it's not an auto-incrementing ID
    protected $keyType = 'string';

    protected $fillable = [
        'registration_number',
        'owner_id',
        'make',
        'model',
        'description',
        'year',
        'colour',
        'vin_number',
        'engine_type',
        'mileage',
        'fuel_type',
        'transmission',
        'is_active',
        'created_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // relationship to user who created this customer
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'employee_id');
    }

    // relationship to customer who owns the car
    public function owner()
    {
        return $this->belongsTo(Customer::class, 'owner_id', 'customer_id');
    }

    // relationship to jobs
    public function jobs()
    {
        return $this->hasMany(Job::class, 'registration_number', 'vehicle_registration');
    }
}
