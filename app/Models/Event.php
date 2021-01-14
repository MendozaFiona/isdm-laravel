<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Event extends Authenticatable
{
    use HasFactory, Notifiable;

    // table name
    protected $table = 'events';

    public $primary_key = 'event_id';

    protected $fillable = [
        'event_name',
        'event_date',
        'event_desc',
    ];

    protected $hidden = [
        'remember_token',
    ];

    
}
