<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

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
        'address',
        'occupation',
        'status',
        'family_role',
        'family_id',
    ];

    public static function totalPopulation()
    {
        $list = Resident::pluck('id')->all();
        return count($list);
    }

    public static function totalMale()
    {
        $list = Resident::where('sex', 'Male')->get();
        return count($list);
    }

    public static function totalFemale()
    {
        $list = Resident::where('sex', 'Female')->get();
        return count($list);
    }

    public static function age($birthdate)
    {
        return Carbon::parse($birthdate)->age;
    }

    public static function householdNum($famid)
    {
        $members = Resident::where('family_id', $famid)->get();
        return count($members);
    }

}
