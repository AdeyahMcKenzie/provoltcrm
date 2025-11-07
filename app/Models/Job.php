<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    //
    use HasFactory;

    protected $primaryKey = 'job_id';
    // Columns that can be mass-assigned
    protected $fillable = [
        'registration_number',
        'customer_id',
        'technician',
        'date',
        'visit_number',
        'status',
        'completion_date',
        'customer_complaint',
        'diagnosis_notes',
        'resolution_notes',
        'total_cost',
        'mileage_at_visit',
        'priority',
        'customer_parts_provided',
        'created_by',
    ];

    protected $casts = [
        'date' => 'date',
        'completion_date' => 'date',
        'total_cost' => 'decimal:2',
    ];

    //Relationships
    
    public function jobServices()
    {
        return $this->hasMany(JobService::class, 'job_id');
    }
    //create relationship with services
    public function services()
    {
        return $this->belongsToMany(Service::class, 'jobs_services','job_id','service_id')
                ->withPivot(['service_price', 'quantity', 'created_at'])
                ->withTimestamps();
    }

    //link job to customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    //link job to vehicle
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'registration_number', 'registration_number');
    }

    //link job to technician 
    public function technicianUser()
    {
        return $this->belongsTo(User::class, 'technician', 'employee_id');
    }

    //link job to creator, will be useful if an office admin is the person entering the jobs
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'employee_id');
    }
}
