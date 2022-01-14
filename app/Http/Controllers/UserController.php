<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Family;
use App\Models\Resident;

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
            // personal info
            'name' => 'required',
            'password' => 'required|min:8',
            'confirm' => 'required_with:password|same:password', 
            'address' => 'required',
            'email' => 'required|unique:user,email',
            'number' => 'required|min:11|max:11|starts_with:09',
            'birthdate' => 'required|date_format:Y-m-d',
            'family_name' => 'exists:family,family_name',

            // occupation & family will be in a validator after this

            // residence
            'prooftype' => 'required',
            'proofpic' => 'required',
            
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('pic_s')) {
            $request->pic_s->store('uploaded_pictures', 'public');
            $occupation_pic = $request->pic_s->hashName();
        }

        if ($request->hasFile('pic_u')) {
            $request->pic_u->store('uploaded_pictures', 'public');
            $occupation_pic = $request->pic_u->hashName();
        }
        
        if ($request->hasFile('pic_se')) {
            $request->pic_se->store('uploaded_pictures', 'public');
            $occupation_pic = $request->pic_se->hashName();
        }

        if ($request->hasFile('pic1')) {
            $request->pic1->store('uploaded_pictures', 'public');
            $occupation_pic = $request->pic1->hashName();
        }

        if ($request->hasFile('proofpic')) {
            $request->proofpic->store('uploaded_pictures', 'public');
            $proof_pic = $request->proofpic->hashName();
        }

        if($request->input('head') == 'on'){
            $famvalidate = Validator::make($request->all(),[
                'family_name2' => 'required|unique:family,family_name',                
            ]);

            if($famvalidate->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            $family = new Family;

            $famname = $request->input('family_name2');

            $family->family_name = $famname;
            $family->head_name = $request->input('name');
            $family->head_phone = $request->input('number');
            $family->family_income = $request->input('famincome');

            $family->save();

            $role = 'Head';
        } else {
            $role = 'Member';
            $famname = $request->input('family_name');
        }

        $resident = new Resident;

        $famid = Family::where('family_name', $famname)->value('id');
        $resname = $request->input('name');

        $resident->name = $resname;
        $resident->birthdate = $request->input('birthdate');
        $resident->sex = $request->input('sex');
        $resident->contact = $request->input('number');
        $resident->occupation = $request->input('type');
        $resident->status = $request->input('status');
        $resident->family_role = $role;
        $resident->family_id = $famid;

        $resident->save();
        
        $user = new User;

        $resid = Resident::where('name', $resname)->value('id');

        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = '2';
        $user->resident_id = $resid;

        $user->save();

        return redirect('/')->with('message', 'Registration Successful');
    }

    public function edit_resident(Request $request)
    {

    }
}
