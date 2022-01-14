<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingRequest extends Model
{
    use HasFactory;
    protected $table = 'pending';

    public $timestamps = false;

    protected $primary_key = 'id';

    protected $fillable = [
        'name',
        'birthdate',
        'sex',
        'contact',
        'address',
        'occupation',
        'status',
        'family_role',
        'family_id',

        'occupation_name',
        'company_name',
        'id_num',
        'pic',
        'resident_id',

        'proof_type',
        'proof_pic',

        'family_name',
        'head_name',
        'head_phone',
        'family_income',

        'email',
        'password',
        'role_id',
    ];

    public static function pendingListCount()
    {
        $list = PendingRequest::pluck('id')->all();
        return count($list);
    }
}
