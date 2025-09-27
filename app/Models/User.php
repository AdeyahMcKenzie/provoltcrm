<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    // Use employee_id as primary key instead of id
    protected $primaryKey = 'employee_id';
    public $incrementing = false;
    protected $keyType = 'string';

     
    protected $fillable = [
        'employee_id',
        'name',
        'email',
        'password',
        'first_name',
        'surname',
        'role',
        'phone',
        'is_active',
        'can_edit',
        'can_delete',
        'hire_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
            'can_edit' => 'boolean',
            'can_delete' => 'boolean',
            'hire_date' => 'date',
        ];
    }
        //check user role
        public function hasRole($role)
        {
            return $this->role === $role;
        }


        public function isActive()
        {
            return $this->is_active;
        }

        public function canEdit()
        {
            return $this->can_edit;
        }

        public function canDelete()
        {
            return $this->can_delete;
        }
    
}
