<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_joining',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',

        'date_of_joining' => 'date',
    ];

    // Relationships for future
    public function education()
    {
        return $this->hasMany(Education::class, 'employee_id');
    }

    public function experience()
    {
        return $this->hasMany(Experience::class, 'employee_id');
    }
}