<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory; //needed for factories to work

    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'first_name',
        'surname',
        'contact_number',
        'email_address',
        'street_address',
        'province',
        'parish',
        'postal_code',
        'alternative_contact',
        'preferred_contact_method',
        'notes',
        'is_active',
        'created_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationship to user who created this customer
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'employee_id');
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'owner_id', 'customer_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'customer_id', 'customer_id');
    }
}
