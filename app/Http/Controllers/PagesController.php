<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model that we are using
use App\Models\User;

// the following are added utilities!
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index(){
        return view('pages/login');
        
        // to pass values to views:
        /*
            (1) return view('pages/login')->with('title', $title);    
            (2) return view('pages/login', compact ('title))
            // ^indicate {{$title}} in blade file
        */

        //passing multiple data using (1)
        /*
            $data = array(
                'title' => 'title here'
                'arr_data' => ['data one', 'data two']
            );

            return view('pages/login')->with($data);
            // ^indicate {{$title}} in blade file
            // for arr_data, in blade:
            //
            //  @if(count($arr_data) > 0){
            //      <ul>
            //          @foreach($arr_data as $data){
            //              <li>{{$data}}</li>
            //          }
            //      </ul>
            //  }
            //  @endif
        */
    
    }

    public function register(){
        return view('pages/register');
    }

    public function dashboard(){
        return view('pages/dashboard');
    }

    public function createEvents(){
        return view('pages/createEvents');
    }

    public function viewUsers(){ // NOT USED!!!
        $users = User::all();
        return view('pages/viewUsers')->with('users', $users);
    }

    public function viewEvents(){
        return view('pages/viewEvents');
    }

}
