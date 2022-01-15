<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // table name
    protected $table = 'news';

    public $timestamps = false;

    protected $primary_key = 'id';

    protected $fillable = [
        'news_title',
        'news_desc',
        'news_pic',
        'news_datetime',
        'admin_id',
    ];
}
