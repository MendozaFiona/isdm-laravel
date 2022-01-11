<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // table name
    protected $table = 'user';

    public $timestamps = false;

    public $primary_key = 'user_id';

    protected $fillable = [
        'email',
        'password',
        'role_id', // no input from form, automatically assigned
        'resident_id', // either should be filled
        'admin_id', //removed, uncomment if needed
    ];

  
    /*protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];*/

    
}
