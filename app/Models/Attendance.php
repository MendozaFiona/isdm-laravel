<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Attendance extends Authenticatable
{
    use HasFactory, Notifiable;

    // table name
    protected $table = 'attendance';

    public $primary_key = 'id';
    public $timestamps = false;

    protected $fillable = [
        'student_id',
        'event_id',
    ];

    protected $hidden = [
        'remember_token',
    ];

    
}
