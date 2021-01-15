<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;

    // table name
    protected $table = 'students';

    public $primaryKey = 'student_id';

    protected $hidden = [
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
}
