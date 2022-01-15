<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PendingRequest;
use App\Models\User;
use App\Models\Family;
use App\Models\Resident;
use App\Models\Occupation;
use App\Models\Proof;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PendingRequestController extends Controller
{
    public function accept_request(Request $request, $pid)
    {
        $pending_request = PendingRequest::where('id', $pid)->first();
        $get_resident = $pending_request->resident_id;

        if($get_resident != null)
        {
            $resident = Resident::where('id', $get_resident)->first();
            $family = Family::where('id', $resident->family_id)->first();
            $occupation = Occupation::where('id', $get_resident)->first();    
            $proof = Proof::where('id', $get_resident)->first();
            $user = User::where('resident_id', $get_resident)->first();
        }

        else
        {
            $family = new Family;
            $resident = new Resident;
            $occupation = new Occupation;
            $proof = new Proof;
            $user = new User;
        }

        if($pending_request->family_role == 'Head')
        {                    
            $family->family_name = $pending_request->family_name;
            $family->head_name = $pending_request->head_name;
            $family->head_phone = $pending_request->head_phone;
            $family->family_income = $pending_request->family_income;

            $family->save();
        }       

        $famid = Family::where('family_name', $pending_request->family_name)->value('id');
        
        $resident->name = $pending_request->name;
        $resident->birthdate = $pending_request->birthdate;
        $resident->sex = $pending_request->sex;
        $resident->contact = $pending_request->contact;
        $resident->address = $pending_request->address;
        $resident->occupation = $pending_request->occupation;
        $resident->status = $pending_request->status;
        $resident->family_role = $pending_request->family_role;
        $resident->family_id = $famid;

        $resident->save();

        $occupation->occupation_name = $pending_request->occupation_name;
        $occupation->company_name = $pending_request->company_name;
        $occupation->id_num = $pending_request->id_num;
        $occupation->type = $pending_request->occupation;
        $occupation->pic = $pending_request->pic;

        if($get_resident != null){
            $res_id = $get_resident;
        } else{
            $res_id = Resident::where('name', $pending_request->name)->value('id');
        }

        $occupation->resident_id = $res_id;
        
        $occupation->save();

        $proof->proof_type = $pending_request->proof_type;
        $proof->proof_pic = $pending_request->proof_pic;
        $proof->resident_id = $res_id;

        $proof->save();

        $user->email = $pending_request->email;
        $user->password = $pending_request->password;
        $user->role_id = $pending_request->role_id;
        $user->resident_id = $res_id;

        $user->save();

        $pending_request->state = 'accepted';
        $pending_request->save();
       
        return Redirect::back()->with('message', 'Request Successfully Accepted.');

    }

    public function reject_request(Request $request, $pid)
    {
        $pending_request = PendingRequest::where('id', $pid)->first();
        $pending_request->state = 'rejected';
        $pending_request->save();

        return Redirect::back()->with('message', 'Request Successfully Rejected.');
    }
}
