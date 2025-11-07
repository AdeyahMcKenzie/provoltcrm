<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class JobService extends Model
{
    //point laravel to the correct table 
    protected $table = 'jobs_services';

    protected $primaryKey = 'id';

    //Columns to be mass-assigned
    protected $fillable = [
        'job_id',
        'service_id',
        'service_price',
        'quantity',
        'start_time',
        'completion_time',
    ];

    

     // One to one relationships because in this table each JobService is linked to one job. 
     public function job()
     {
         return $this->belongsTo(Job::class, 'job_id');
     }
 
     // Each JobService belongs to ONE service
     public function service()
     {
         return $this->belongsTo(Service::class, 'service_id');
     }
}
