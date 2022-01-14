<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Family;
use App\Models\Resident;
use App\Models\Occupation;
use App\Models\Proof;
use App\Models\PendingRequest;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function add_resident(Request $request)
    {        
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

        $pending = new PendingRequest;

        if ($request->hasFile('pic_s')) {
            $request->pic_s->store('uploaded_pictures', 'public');
            $pending->pic = $request->pic_s->hashName();
            $pending->occupation_name = $request->input('occupation_name_s');
            $pending->company_name = $request->input('company_s');
            $pending->id_num = $request->input('id_num');
        }

        if ($request->hasFile('pic_u')) {
            $request->pic_u->store('uploaded_pictures', 'public');
            $pending->pic = $request->pic_u->hashName();
            $pending->occupation_name = $request->input('occupation_name_u');
        }
        
        if ($request->hasFile('pic_se')) {
            $request->pic_se->store('uploaded_pictures', 'public');
            $pending->pic = $request->pic_se->hashName();
            $pending->company_name = $request->input('company_se');
        }

        if ($request->hasFile('pic1')) {
            $request->pic1->store('uploaded_pictures', 'public');
            $pending->pic = $request->pic1->hashName();
            $pending->occupation_name = $request->input('occupation_name1');
            $pending->company_name = $request->input('company1');
        }
      
        //proof
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

            $famname = $request->input('family_name2');

            $pending->family_name = $famname;
            $pending->head_name = $request->input('name');
            $pending->head_phone = $request->input('number');
            $pending->family_income = $request->input('famincome');

            $role = 'Head';
        } else {
            $role = 'Member';
            $famname = $request->input('family_name');
            $famhead = Family::where('family_name', $famname)->value('head_name');
            $headphone = Family::where('family_name', $famname)->value('head_phone');
            $faminc = Family::where('family_name', $famname)->value('family_income');
            $pending->head_name = $famhead;
            $pending->head_phone = $headphone;
            $pending->family_income = $faminc;
        }

        $famid = Family::where('family_name', $famname)->value('id');
                $resname = $request->input('name');

        $pending->name = $resname;
        $pending->birthdate = $request->input('birthdate');
        $pending->sex = $request->input('sex');
        $pending->contact = $request->input('number');
        $pending->address = $request->input('address');
        $pending->occupation = $request->input('type');
        $pending->status = $request->input('status');
        $pending->family_role = $role;
        $pending->family_id = $famid;

        $pending->family_name = $famname;
            
        $idcount = Resident::latest('id')->first();
        $resid = $idcount->id + 1;

        //$pending->type = $request->input('type');

        $pending->proof_type = $request->input('prooftype');
        $pending->proof_pic = $proof_pic;

        //$proof->resident_id = $resid;
        
        $pending->email = $request->input('email');
        $pending->password = Hash::make($request->input('password'));
        $pending->role_id = '2';
        //$user->resident_id = $resid;

        $pending->save();

        return Redirect::back()->with('message', 'Registration Awaiting for Verification. A message will be sent to notify approval.');
    }

    public function edit_resident(Request $request)
    {
        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(),[
            // personal info
            'name' => 'required',
            'password' => 'required|min:8',
            'confirm' => 'required_with:password|same:password', 
            'address' => 'required',
            'email' => 'required|unique:user,email,'.$user_id,
            'number' => 'required|min:11|max:11|starts_with:09',
            'birthdate' => 'required|date_format:Y-m-d',
            'family_name' => 'required_without:family_name2|exists:family,family_name',
            'family_name2' => 'required_without:family_name',

            // occupation & family will be in a validator after this

            // residence
            'prooftype' => 'required',
            'proofpic' => 'required',
            
        ]);

        
        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $res_id = Auth::user()->resident_id;
        
        $user = User::find($user_id);
        $resident = Resident::find($res_id);

        $occupation = Occupation::where('resident_id', $res_id)->first();

        $pending = new PendingRequest;
        
        if ($request->hasFile('pic_s')) {
            $request->pic_s->store('uploaded_pictures', 'public');
            $pending->pic = $request->pic_s->hashName();
            $pending->occupation_name = $request->input('occupation_name_s');
            $pending->company_name = $request->input('company_s');
            $pending->id_num = $request->input('id_num');
        }

        if ($request->hasFile('pic_u')) {
            $request->pic_u->store('uploaded_pictures', 'public');
            $pending->pic = $request->pic_u->hashName();
            $pending->occupation_name = $request->input('occupation_name_u');
        }
        
        if ($request->hasFile('pic_se')) {
            $request->pic_se->store('uploaded_pictures', 'public');
            $pending->pic = $request->pic_se->hashName();
            $pending->company_name = $request->input('company_se');
        }

        if ($request->hasFile('pic1')) {
            $request->pic1->store('uploaded_pictures', 'public');
            $pending->pic = $request->pic1->hashName();
            $pending->occupation_name = $request->input('occupation_name1');
            $pending->company_name = $request->input('company1');
        }

        if ($request->hasFile('proofpic')) {
            $request->proofpic->store('uploaded_pictures', 'public');
            $proof_pic = $request->proofpic->hashName();
        }

        //$pending->type = $request->input('type');
        $pending->resident_id = $res_id;

        $proof = Proof::where('resident_id', $res_id)->first();
        $pending->proof_type = $request->input('prooftype');
        $pending->proof_pic = $proof_pic;

        if($request->input('head') == 'on'){
            $old_famname = Family::where('id', $resident->family_id)->value('family_name');
            
            if($request->input('family_name2') != $old_famname){
                $family = new Family;
            } else{
                $family = Family::find($resident->family_id);
            }
            
            $famname = $request->input('family_name2');
            
            $pending->head_name = $request->input('name');
            $pending->head_phone = $request->input('number');
            $pending->family_income = $request->input('famincome');

            $role = 'Head';
        } else {
            $role = 'Member';
            $famname = $request->input('family_name');
            $famhead = Family::where('family_name', $famname)->value('head_name');
            $headphone = Family::where('family_name', $famname)->value('head_phone');
            $faminc = Family::where('family_name', $famname)->value('family_income');
            
            $pending->head_name = $famhead;
            $pending->head_phone = $headphone;
            $pending->family_income = $faminc;
        }
        
        $pending->family_name = $famname;
        
        $famid = Family::where('family_name', $famname)->value('id');
        $resname = $request->input('name');

        $pending->name = $resname;
        $pending->birthdate = $request->input('birthdate');
        $pending->sex = $request->input('sex');
        $pending->contact = $request->input('number');
        $pending->address = $request->input('address');
        $pending->occupation = $request->input('type');
        $pending->status = $request->input('status');
        $pending->family_role = $role;
        $pending->family_id = $famid;
        
        $pending->email = $request->input('email');
        $pending->password = Hash::make($request->input('password'));
        $pending->role_id = '2';

        $pending->save();

        return Redirect::back()->with('message', 'Edit Profile Waiting for Approval');

        /*$new_email = $request->input('email');
        $new_name = $request->input('name');
        $new_addr = $request->input('address');
        $new_contact = $request->input('number');
        $new_bdate = $request->input('birthdate');*/
        
        // works for avoiding adding to pending w/o modifications
        /*$change = 0;

        if($user->email != $new_email){
            $user->email = $new_email;
            $change += 1;
        }

        $change += 1;*/

    }
}
