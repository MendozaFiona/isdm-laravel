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
            
        DB::table('resident')->insert(array(
            array(
                'name' => 'John Ryle F. Timares',
                'birthdate' => '10/01/1986',
                'sex' => 'Male',
                'contact' => '09287364517',
                'occupation' => 'Employed',
                'status' => 'Married',
                'family_role' => 'Head',
                'family_id' => '1',
                'street_id' => '1',
            ),
        ));
            
        // need the proof table but i still dk how to add image
        /*DB::table('proof')->insert(array(
            array(
                'proof_type' => '',
                'proof_pic' => '',
                'resident_id' => '1',
            ),
        ));*/
            
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
                'email' => 'imae.maturan@gmail.com',
                'password' => Hash::make('irishpass'), // still not sure about this
                'role_id' => '1',
                'admin_id' => '1',
            ),
        ));
            
    }
}
