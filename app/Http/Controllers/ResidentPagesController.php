<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResidentPagesController extends Controller
{
    public function profile()
    {
        return view('user/profile'); 
    }

}
