<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PendingRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class PendingRequestController extends Controller
{
    public function accept_request(Request $request, $pid)
    {
        dd($request->query('pid'));
    }

    public function reject_request(Request $request, $pid)
    {
        dd($request->query('pid'));
    }
}
