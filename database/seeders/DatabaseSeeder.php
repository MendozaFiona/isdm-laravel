<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert(array(
            array(
                'admin_name' => 'Irish Mae Maturan',
            ),
        ));
            
        // tentative, do you have street names lists?
        /*DB::table('street')->insert(array(
            array(
                'street_name' => '',
                'rep_name' => '',
                'rep_phone' => '',
            ),
        ));*/
            
        // is this monthly or annual income
        DB::table('family')->insert(array(
            array(
                'family_name' => 'Fajardo-Timares',
                'head_name' => 'John Ryle F. Timares',
                'head_phone' => '09287364517',
                'family_income' => '100000',
            ),
            array(
                'family_name' => 'Paderes-Mendoza',
                'head_name' => 'Joel Julieto N. Mendoza',
                'head_phone' => '09246758321',
                'family_income' => '80000',
            ),
        ));
            
        DB::table('resident')->insert(array(
            array(
                'name' => 'John Ryle F. Timares',
                'birthdate' => '10/01/1986',
                'sex' => 'Male',
                'contact' => '09287364517',
                'address' => '12th St, Nazareth, Cagayan de Oro, 9000 Misamis Oriental',
                'occupation' => 'Employed',
                'status' => 'Married',
                'family_role' => 'Head',
                'family_id' => '1',
            ),
            array(
                'name' => 'Kyla Tume F. Timares',
                'birthdate' => '12/14/1994',
                'sex' => 'Female',
                'contact' => '09287389524',
                'address' => '12th St, Nazareth, Cagayan de Oro, 9000 Misamis Oriental',
                'occupation' => 'Unemployed',
                'status' => 'Single',
                'family_role' => 'Member',
                'family_id' => '1',
            ),
            array(
                'name' => 'Fiona Glezen Xi P. Mendoza',
                'birthdate' => '12/14/1999',
                'sex' => 'Female',
                'contact' => '09234543524',
                'address' => '24th St, Cagayan de Oro, 9000 Misamis Oriental',
                'occupation' => 'Student',
                'status' => 'Single',
                'family_role' => 'Member',
                'family_id' => '2',
            ),
        ));
            
        DB::table('proof')->insert(array(
            array(
                'proof_type' => 'UMID',
                'proof_pic' => 'umid-sample.png',
                'resident_id' => '1',
            ),
            array(
                'proof_type' => 'Electricity Bill',
                'proof_pic' => 'electric-bill-sample.png',
                'resident_id' => '2',
            ),
            array(
                'proof_type' => "Driver License",
                'proof_pic' => 'drivers-license-sample.jpg',
                'resident_id' => '3',
            ),
        ));

        DB::table('user')->insert(array(
            array(
                'email' => 'imae.maturan@gmail.com',
                'password' => Hash::make('irishpass'), // still not sure about this
                'role_id' => '1',
                'admin_id' => '1',
            ),
        ));
            
        DB::table('user')->insert(array(
            array(
                'email' => 'jrft@gmail.com',
                'password' => Hash::make('jrftpass'), // still not sure about this
                'role_id' => '2',
                'resident_id' => '1',
            ),
            array(
                'email' => 'kytum@gmail.com',
                'password' => Hash::make('kylapass'), // still not sure about this
                'role_id' => '2',
                'resident_id' => '2',
            ),
            array(
                'email' => 'fionamendoza@gmail.com',
                'password' => Hash::make('fionapass'), // still not sure about this
                'role_id' => '2',
                'resident_id' => '3',
            ),
        ));
        
        DB::table('occupation')->insert(array(
            array(
                'type' => 'Employed',
                'occupation_name' => 'Government Employee',
                'company_name' => 'CHED',
                'id_num'=> null,
                'pic' => 'employed-sample.jpg',
                'resident_id' => '1',
            ),
            array(
                'type' => 'Unemployed',
                'occupation_name' => 'PWD',
                'company_name' => null,
                'id_num'=> null,
                'pic' => 'pwd-sample.png',
                'resident_id' => '2',
            ),
            array(
                'type' => 'Unemployed',
                'occupation_name' => 'College',
                'company_name' =>'DOST',
                'id_num'=> '2018102607',
                'pic' => 'student-sample.jpg',
                'resident_id' => '3',
            ),
        ));

        DB::table('pending')->insert(array(
            array(
                'name' => 'Kyla Tume F. Timares',
                'birthdate' => '12/30/1994',
                'sex' => 'Female',
                'contact' => '09287399524',
                'address' => '12th St, Nazareth, Cagayan de Oro, 9000 Misamis Oriental',
                'occupation' => 'Unemployed',
                'status' => 'Single',
                'family_role' => 'Member',
                'family_id' => '1',

                'occupation_name' => 'PWD',
                'company_name' => null,
                'id_num' => null,
                'pic' => 'pwd-sample.png',
                'resident_id' => '2',

                'proof_type' => 'UMID',
                'proof_pic' => 'umid-sample.png',
                
                'family_name' => 'Fajardo-Timares',
                'head_name' => 'John Ryle F. Timares',
                'head_phone' => '09287364517',
                'family_income' => '100000',

                'email' => 'kytum22@gmail.com',
                'password' => Hash::make('kylapass'), // still not sure about this
                'role_id' => '2',
                'user_id' => '3',

                'state' => 'pending',
            ),
            array(
                'name' => 'Ashley P. Mendoza',
                'birthdate' => '04/20/1998',
                'sex' => 'Female',
                'contact' => '09143567345',
                'address' => '24th St, Cagayan de Oro, 9000 Misamis Oriental',
                'occupation' => 'Student',
                'status' => 'Single',
                'family_role' => 'Member',
                'family_id' => '2',

                'occupation_name' => 'College',
                'company_name' => 'CHED',
                'id_num' => '2018112618',
                'pic' => 'student-2-sample.jpg',
                'resident_id' => null,

                'proof_type' => 'Police ID/Clearance',
                'proof_pic' => 'police-clearance-sample.png',
                
                'family_name' => 'Paderes-Mendoza',
                'head_name' => 'Joel Julieto N. Mendoza',
                'head_phone' => '09246758321',
                'family_income' => '80000',

                'email' => 'ashleymendoza141@gmail.com',
                'password' => Hash::make('ashee123'), // still not sure about this
                'role_id' => '2',
                'user_id' => null,

                'state' => 'pending',
            ),
            array(
                'name' => 'John Ryle F. Timares',
                'birthdate' => '1986/10/01',
                'sex' => 'Male',
                'contact' => '09287364657',
                'address' => '12th St, Nazareth, Cagayan de Oro, 9000 Misamis Oriental',
                'occupation' => 'Employed',
                'status' => 'Married',
                'family_role' => 'Head',
                'family_id' => '1',

                'occupation_name' => 'Government Employee',
                'company_name' => 'City Hall',
                'id_num' => null,
                'pic' => 'employed-sample.jpg',
                'resident_id' => '1',

                'proof_type' => 'Electricity Bill',
                'proof_pic' => 'electric-bill-sample.png',
                
                'family_name' => 'Fajardo-Timares',
                'head_name' => 'John Ryle F. Timares',
                'head_phone' => '09287364657',
                'family_income' => '120000',

                'email' => 'jrft_@gmail.com',
                'password' => Hash::make('jrftpass'), // still not sure about this
                'role_id' => '2',
                'user_id' => '2',

                'state' => 'pending',
            ),
        ));
            
    }
}
