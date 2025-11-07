<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $primaryKey = 'service_id';

    protected $fillable = [
        'service_name',
        'service_price',
        'description',
        'category',
        'estimated_time_hours',
        'is_active',
        'warranty_period_days',
    ];

    protected $casts = [
        'service_price' => 'decimal:2',
        'estimated_time_hours' => 'decimal:2',
        'is_active' => 'boolean',
        'warranty_period_days' => 'integer',
    ];

    public function jobServices()
    {
        return $this->hasMany(JobService::class, 'service_id');
    }
    
    // relationship to jobs
    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'jobs_services','job_id','service_id')
                ->withPivot(['service_price', 'quantity', 'ceated_at'])
                ->withTimestamps();
    }

   

    /*
    public function quotes()
    {
        return $this->hasMany(Quote::class, 'service_id');
    }*/

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Helper methods
    public function getFormattedPriceAttribute()
    {
        return 'BBD $' . number_format($this->service_price, 2);
    }

    public function getEstimatedTimeFormattedAttribute()
    {
        if (!$this->estimated_time_hours) {
            return 'N/A';
        }
        
        $hours = floor($this->estimated_time_hours);
        $minutes = ($this->estimated_time_hours - $hours) * 60;
        
        if ($hours > 0 && $minutes > 0) {
            return $hours . 'h ' . round($minutes) . 'm';
        } elseif ($hours > 0) {
            return $hours . 'h';
        } else {
            return round($minutes) . 'm';
        }
    }

    public function isActive()
    {
        return $this->is_active;
    }
}
