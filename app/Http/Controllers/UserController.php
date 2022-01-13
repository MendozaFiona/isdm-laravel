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

        /*$validator = Validator::make($request->all(),[
            // personal info
            'name' => 'required',
            'password' => 'required|min:8',
            'confirm' => 'required_with:password|same:password', 
            'address' => 'required',
            'email' => 'required|unique:user,email',
            'number' => 'required|min:11|max:11|starts_with:09',
            'birthdate' => 'required|date_format:Y-m-d',
            'famname' => 'required|exists:family,family_name',

            // occupation & family will be in a validator after this

            // residence
            'prooftype' => 'required',
            'proofpic' => 'required',
            
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }*/

        if($request->input('type') == 'Employed'){
            $o1 = $request->input('occupation_name1');
            $o2 = $request->input('occupation_name2');
            $o3 = $request->input('occupation_name3');

            if($o1 == null || $o2 == null || $o3 == null){
                return Redirect::back()->withErrors("Occupation must not be empty.")->withInput();
            }

            $c1 = $request->input('company1');
            $c2 = $request->input('company2');
            $c3 = $request->input('company3');

            if($c1 == null || $c2 == null || $c3 == null){
                return Redirect::back()->withErrors("Company name must not be empty.")->withInput();
            }

            $i1 = $request->input('pic1');
            $i2 = $request->input('pic2');
            $i3 = $request->input('pic3');

            if($i1 == null || $i2 == null || $i3 == null){
                return Redirect::back()->withErrors("Please provide an image.")->withInput();
            }

        }

        if($request->input('type') == 'Student' ||
            $request->input('type') == 'Self-employed'){

            if($request->input('type') == 'Student' &&
                $request->input('company') == null){
                return Redirect::back()->withErrors("Scholarship name must not be empty.")->withInput();
            }

            if($request->input('type') == 'Self-employed' &&
                $request->input('company') == null){
                return Redirect::back()->withErrors("Business name must not be empty.")->withInput();
            }

            if($request->input('type') == 'Student' &&
                $request->input('id_num') == null){
                return Redirect::back()->withErrors("ID Number must not be empty.")->withInput();
            }

            if($request->input('pic') == null){
                return Redirect::back()->withErrors("Please provide an image.")->withInput();
            }
        }

        if($request->input('type') == 'Unemployed' &&
            $request->input('pic') == null){
            return Redirect::back()->withErrors("Please provide an image.")->withInput();
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
