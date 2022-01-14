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
    
    public static function totalSenior()
    {
        $list = Occupation::where('occupation_name', 'Senior')->get();
        return count($list);
    }

    public static function totalPWD()
    {
        $list = Occupation::where('occupation_name', 'PWD')->get();
        return count($list);
    }

    public static function educLevel($resid)
    {
        $level = Occupation::where('resident_id', $resid)->value('occupation_name');
        return $level;
    }

    public static function scholarSponsor($resid)
    {
        $sponsor = Occupation::where('resident_id', $resid)->value('company_name');
        return $sponsor;
    }

}
