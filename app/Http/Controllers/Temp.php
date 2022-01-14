<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Family;
use App\Models\Resident;
use App\Models\Occupation;
use App\Models\Proof;

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

        $occupation = new Occupation;

        if ($request->hasFile('pic_s')) {
            $request->pic_s->store('uploaded_pictures', 'public');
            $occupation->pic = $request->pic_s->hashName();
            $occupation->occupation_name = $request->input('occupation_name_s');
            $occupation->company_name = $request->input('company_s');
            $occupation->id_num = $request->input('id_num');
        }

        if ($request->hasFile('pic_u')) {
            $request->pic_u->store('uploaded_pictures', 'public');
            $occupation->pic = $request->pic_u->hashName();
            $occupation->occupation_name = $request->input('occupation_name_u');
        }
        
        if ($request->hasFile('pic_se')) {
            $request->pic_se->store('uploaded_pictures', 'public');
            $occupation->pic = $request->pic_se->hashName();
            $occupation->company_name = $request->input('company_se');
        }

        if ($request->hasFile('pic1')) {
            $request->pic1->store('uploaded_pictures', 'public');
            $occupation->pic = $request->pic1->hashName();
            $occupation->occupation_name = $request->input('occupation_name1');
            $occupation->company_name = $request->input('company1');
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
        $resident->address = $request->input('address');
        $resident->occupation = $request->input('type');
        $resident->status = $request->input('status');
        $resident->family_role = $role;
        $resident->family_id = $famid;

        $resident->save();
        
        $user = new User;

        $resid = Resident::where('name', $resname)->value('id');

        $occupation->type = $request->input('type');
        $occupation->resident_id = $resid;
        $occupation->save();

        $proof = new Proof;
        $proof->proof_type = $request->input('prooftype');
        $proof->proof_pic = $proof_pic;

        $proof->resident_id = $resid;
        $proof->save();

        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = '2';
        $user->resident_id = $resid;

        $user->save();

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
        
        if ($request->hasFile('pic_s')) {
            $request->pic_s->store('uploaded_pictures', 'public');
            $occupation->pic = $request->pic_s->hashName();
            $occupation->occupation_name = $request->input('occupation_name_s');
            $occupation->company_name = $request->input('company_s');
            $occupation->id_num = $request->input('id_num');
        }

        if ($request->hasFile('pic_u')) {
            $request->pic_u->store('uploaded_pictures', 'public');
            $occupation->pic = $request->pic_u->hashName();
            $occupation->occupation_name = $request->input('occupation_name_u');
        }
        
        if ($request->hasFile('pic_se')) {
            $request->pic_se->store('uploaded_pictures', 'public');
            $occupation->pic = $request->pic_se->hashName();
            $occupation->company_name = $request->input('company_se');
        }

        if ($request->hasFile('pic1')) {
            $request->pic1->store('uploaded_pictures', 'public');
            $occupation->pic = $request->pic1->hashName();
            $occupation->occupation_name = $request->input('occupation_name1');
            $occupation->company_name = $request->input('company1');
        }

        if ($request->hasFile('proofpic')) {
            $request->proofpic->store('uploaded_pictures', 'public');
            $proof_pic = $request->proofpic->hashName();
        }

        $occupation->type = $request->input('type');
        $occupation->resident_id = $res_id;
        $occupation->save();

        $proof = Proof::where('resident_id', $res_id)->first();
        $proof->proof_type = $request->input('prooftype');
        $proof->proof_pic = $proof_pic;

        $proof->resident_id = $res_id;
        $proof->save();

        if($request->input('head') == 'on'){
            $old_famname = Family::where('id', $resident->family_id)->value('family_name');
            
            if($request->input('family_name2') != $old_famname){
                $family = new Family;
            } else{
                $family = Family::find($resident->family_id);
            }
            
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
        
        $famid = Family::where('family_name', $famname)->value('id');
        $resname = $request->input('name');

        $resident->name = $resname;
        $resident->birthdate = $request->input('birthdate');
        $resident->sex = $request->input('sex');
        $resident->contact = $request->input('number');
        $resident->address = $request->input('address');
        $resident->occupation = $request->input('type');
        $resident->status = $request->input('status');
        $resident->family_role = $role;
        $resident->family_id = $famid;

        $resident->save();
        
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = '2';
        $user->resident_id = $res_id;

        $user->save();

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
