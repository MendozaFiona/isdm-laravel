<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use HasFactory;

    // table name
    protected $table = 'occupation';

    public $timestamps = false;

    protected $primary_key = 'id';

    protected $fillable = [
        'type',
        'occupation_name',
        'company_name',
        'id_num',
        'pic',
        'resident_id',
    ];
}
