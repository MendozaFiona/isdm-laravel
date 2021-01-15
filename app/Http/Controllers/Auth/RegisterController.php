<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Student;
use App\Models\Fee;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
//use \Illuminate\Database\QueryException;
//use Illuminate\Validation\ValidationException;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = "/";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'school_id' => 'required',
            'amount' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
 
        $check = Student::find($data['school_id']);
        
        if($check != null){
            $fee = new Fee;

            //optional if you want varying fee_id
            //$mytime = Carbon::now();
            //$id = $data['school_id'].$mytime->toDateTimeString();

            $fee->amount = $data['amount'];
            $fee->student_id = $data['school_id'];

            $fee->save();

            return User::create([
                'username' => $data['username'],
                'student_id' => $data['school_id'],
                'role_id' => '2',
                'password' => Hash::make($data['password']),
            ]);
        }

        else{
            return redirect('/register');
        }

    }

    /*protected function sendFailedLoginResponse()
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ])
        ->redirectTo("/register");
    }*/

}