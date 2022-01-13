<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Family;
//use App\Models\Resident; // yet to be added

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function add_resident(Request $request)
    {
        //this is just a sample

        $validator = Validator::make($request->all(),[
            // user_id is automatically generated
            'name' => 'required',
            'password' => 'required|min:8',
            'confirm' => 'required_with:password|same:password', 
            'address' => 'required',
            'email' => 'required|unique:user,email',
            'number' => 'required|min:11|max:11|starts_with:09',
            'birthdate' => 'required|date_format:Y-m-d',
            'famname' => 'required|exists:family,family_name',
            
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        dd("success");
        
        $user = new User;

        $offices_array = Office::officesArray();
        $office_name =  $offices_array[$request->input('name')];

        $office_id = Office::select('id')->where('name', $office_name)->first();
        
        $user->username = $request->input('username');
        $user->password = Hash::make($request->input('password'));
        $user->office_id = $office_id->id;
        $user->role_id = 2;

        $user->save();

        return Redirect::back()->with('success', 'Office Registration Successful');
    }
}
