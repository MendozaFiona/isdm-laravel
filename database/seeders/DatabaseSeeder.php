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
        ));

        DB::table('family')->insert(array(
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
        ));

        DB::table('resident')->insert(array(
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
        ));
            
        DB::table('proof')->insert(array(
            array(
                'proof_type' => 'UMID',
                'proof_pic' => '7HWgTmdi5WEbltr09GcUfYgL73WAjqduIoSEpNaY.png',
                'resident_id' => '1',
            ),
        ));

        DB::table('proof')->insert(array(
            array(
                'proof_type' => 'Electricity Bill',
                'proof_pic' => '7HWgTmdi5WEbltr09GcUfYgL73WAjqduIoSEpNaY.png',
                'resident_id' => '2',
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
        ));

        DB::table('user')->insert(array(
            array(
                'email' => 'kytum@gmail.com',
                'password' => Hash::make('kylapass'), // still not sure about this
                'role_id' => '2',
                'resident_id' => '2',
            ),
        ));
        
        DB::table('occupation')->insert(array(
            array(
                'type' => 'Employed',
                'occupation_name' => 'Government Employee',
                'company_name' => 'CHED',
                'pic' => '7HWgTmdi5WEbltr09GcUfYgL73WAjqduIoSEpNaY.png',
                'resident_id' => '1',
            ),
        ));

        DB::table('occupation')->insert(array(
            array(
                'type' => 'Unemployed',
                'occupation_name' => 'PWD',
                'pic' => '7HWgTmdi5WEbltr09GcUfYgL73WAjqduIoSEpNaY.png',
                'resident_id' => '2',
            ),
        ));
            
    }
}
