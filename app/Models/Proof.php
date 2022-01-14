<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proof extends Model
{
    use HasFactory;
    // table name
    protected $table = 'proof';

    public $timestamps = false;

    protected $primary_key = 'id';

    protected $fillable = [
        'proof_type',
        'proof_pic',
        'resident_id',
    ];
}
