<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PendingRequest;

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

    public function viewmore($id)
    {
        $pending_user = PendingRequest::where('id', $id)->first();
        
        return view('admin/viewmore')->with('pending_user', $pending_user); //pending 
    }

    public function more($id)
    {
        return view('admin/more'); //pending 
    }
    
}
