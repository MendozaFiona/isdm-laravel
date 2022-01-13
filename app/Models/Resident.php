<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    // table name
    protected $table = 'resident';

    public $timestamps = false;

    protected $primary_key = 'id';

    protected $fillable = [
        'name',
        'birthdate',
        'sex',
        'contact',
        'occupation',
        'status',
        'family_role',
        'family_id',
    ];
}
