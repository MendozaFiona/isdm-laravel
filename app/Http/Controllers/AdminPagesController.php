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

class AdminPagesController extends Controller
{
    public function records(Request $request)
    {
        $search = $request->query('searchitem');

        if($search != null){
            $residentList = Resident::where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('contact', 'LIKE', '%' . $search . '%')->get();
        } else {
            $residentList = Resident::all();
        }
        
        return view('admin/records')->with('residentList', $residentList);
    }

    public function grants(Request $request)
    {
        $search = $request->query('searchitem');
        $scholar = Resident::where('occupation', 'Student');

        if($search != null){
            $scholarList = $scholar->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('contact', 'LIKE', '%' . $search . '%')->get();
        } else {
            $scholarList = $scholar->get();
        }

        return view('admin/grants')->with('scholarList', $scholarList);
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
        $resident = Resident::where('id', $id)->first();
        $user = User::where('resident_id', $resident->id)->first();
        $occupation = Occupation::where('resident_id', $resident->id)->first();
        $proof = Proof::where('resident_id', $resident->id)->first();
        $family = Family::where('id', $resident->family_id)->first();

        return view('admin/more')->with('resident', $resident)
            ->with('user', $user)
            ->with('occupation', $occupation)
            ->with('proof', $proof)
            ->with('family', $family); //pending 
    }
    
}
