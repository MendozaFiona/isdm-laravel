<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// model that we are using
use App\Models\User;

// the following are added utilities!
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function index()
    {
        //
    }


    public function addUser(Request $request) // for Registration
    {
        $validator = Validator::make($request->all(),[
            // user_id is automatically generated
            'user_name' => 'required',
            'user_pass' => 'required',
            'user_role' => 'required',
            'student_id' => 'required_without:teacher_id', // either should be filled
            'teacher_id' => 'required_without:student_id', // either should be filled
        ]);

        if($validator->fails()){

            $errors = $validator->errors(); // detects errors and stores in individual variables
            $err = array(
                // ff. stores detected errors for each field in ther $err array
                'user_name' => $errors->first('user_name'),
                'user_pass' => $errors->first('user_pass'),
                'user_role' => $errors->first('user_role'),
                'student_id' => $errors->first('student_id'),
                'teacher_id' => $errors->first('teacher_id'),
            );

            return response()->json(array(
                'message' => 'Cannot process request. Input errors.',
                'errors' => $err
            ), 422);

        }

        $user = new User;

        $user->user_name = $request->input('user_name');
        // this is to hash the user password in the database
        $user->user_pass = Hash::make($request->input('user_pass'));
        /* NOTE:
            role_id will automatically be 2 for member registration,
            only one teacher/moderator will be 1 for admin
        */
        $user->user_role = $request->input('role_id');

        $teacher_check =  $request->input('teacher_id');

        /* NOTE:
            Please add finding corresponding student_id/teacher_id in their
            respective tables! If id not found, return an error response!
        */

        // to not store anything if teacher_id is null
        if($teacher_check != null){
            $user->teacher_id = $request->input('teacher_id');
        } else {
            $user->student_id = $request->input('student_id');
        }
        
        $user->save();
        
        return response()->json(array(
            'message' => 'Registration Successful',
            'user' => $user
        ), 201);

    }

    
    public function showUser($id) //show a specific User
    {
        //
    }

    
    public function updateUser(Request $request, $id) //edit User profile
    {
        //
    }

    
    public function destroyUser($id) //delete User
    {
        //
    }
}
