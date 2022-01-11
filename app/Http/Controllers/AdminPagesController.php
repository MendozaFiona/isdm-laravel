<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function records()
    {
        return view('admin/records');
    }

    public function grants()
    {
        return view('admin/grants');
    }

    public function news()
    {
        return view('admin/news');
    }

    public function pending()
    {
        return view('admin/pending');
    }

    public function viewmore()
    {
        return view('admin/viewmore'); 
    }
}
