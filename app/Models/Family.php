<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    // table name
    protected $table = 'family';

    public $timestamps = false;

    protected $primary_key = 'id';

    protected $fillable = [
        'family_name',
        'head_name',
        'head_phone',
        'family_income',
    ];

    public static function totalHousehold()
    {
        $list = Family::pluck('id')->all();
        return count($list);
    }

    public static function houseHead($famid)
    {
        $head = Family::where('id', $famid)->value('head_name');
        return $head;
    }

}
