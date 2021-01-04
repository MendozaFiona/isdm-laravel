<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Default Courses
        DB::table('courses')->insert(array(
            array(
                'course_id' => 'CITC-BSIT',
                'course_name' => 'Information Technology'
            ),
            array(
                'course_id' => 'CITC-BSTCM',
                'course_name' => 'Technology Communication Management'
            ),
            array(
                'course_id' => 'CITC-BSCPE',
                'course_name' => 'Computer Engineering'
            ),
        ));

        // Default Teacher
        DB::table('teachers')->insert(
            array(
                'teacher_id' => '2005204365',
                'teacher_name' => 'Maria de la Rosa'
            ),
        );

        // Default Roles
        DB::table('roles')->insert(array(
            array(
                'role_name' => 'moderator'
            ),
            array(
                'role_name' => 'member'
            ),
        ));

        // Default Organization
        DB::table('organizations')->insert(
            array(
                'org_id' => 'USTPCITC01',
                'org_name' => 'SITE - Society of Information Technology Enthusiasts',
                'org_fee' => '200'
            ),
        );

        // Default Students
        DB::table('students')->insert(array(
            array(
                'student_id' => '2019236542',
                'student_name' => 'Josephine B. Mapalag',
                'student_year' => '2nd Year',
                'student_gender' => 'Female',
                'student_contact' => '09345782913',
                'student_email' => 'josephinB@gmail.com',
                'course_id' => 'CITC-BSIT',
                'org_id' => 'USTPCITC01'
            ),
            array(
                'student_id' => '2018108756',
                'student_name' => 'Mariano Jose A. Bagunoy',
                'student_year' => '3rd Year',
                'student_gender' => 'Male',
                'student_contact' => '09175689215',
                'student_email' => 'MJ.Bagz@gmail.com',
                'course_id' => 'CITC-BSCPE',
                'org_id' => 'USTPCITC01'
            ),
            array(
                'student_id' => '2020176549',
                'student_name' => 'Ryan Martin V. Amihan',
                'student_year' => '1st Year',
                'student_gender' => 'Male',
                'student_contact' => '09269874631',
                'student_email' => 'rymartamihan@gmail.com',
                'course_id' => 'CITC-BSIT',
                'org_id' => 'USTPCITC01'
            ),
            array(
                'student_id' => '2019103456',
                'student_name' => 'Flora Donna S. Verdante',
                'student_year' => '2nd Year',
                'student_gender' => 'Female',
                'student_contact' => '09348759643',
                'student_email' => 'floradonna34@gmail.com',
                'course_id' => 'CITC-BSTCM',
                'org_id' => 'USTPCITC01'
            ),
            array(
                'student_id' => '2020107564',
                'student_name' => 'Ailee R. Su',
                'student_year' => '1st Year',
                'student_gender' => 'Female',
                'student_contact' => '09126789254',
                'student_email' => 'aileelee@gmail.com',
                'course_id' => 'CITC-BSCPE',
                'org_id' => 'USTPCITC01'
            ),
            array(
                'student_id' => '2019147653',
                'student_name' => 'Lou Fe G. Huminay',
                'student_year' => '2nd Year',
                'student_gender' => 'Female',
                'student_contact' => '09964785321',
                'student_email' => 'loufehuminay@gmail.com',
                'course_id' => 'CITC-BSTCM',
                'org_id' => 'USTPCITC01'
            ),
            array(
                'student_id' => '2018138452',
                'student_name' => 'Mark John E. Laminot',
                'student_year' => '3rd Year',
                'student_gender' => 'Male',
                'student_contact' => '09368241859',
                'student_email' => 'markie22@gmail.com',
                'course_id' => 'CITC-BSIT',
                'org_id' => 'USTPCITC01'
            ),
            array(
                'student_id' => '2019126547',
                'student_name' => 'Mary Ann Cole H. Fuente',
                'student_year' => '2nd Year',
                'student_gender' => 'Female',
                'student_contact' => '09154786400',
                'student_email' => 'mach.fuente@gmail.com',
                'course_id' => 'CITC-BSTCM',
                'org_id' => 'USTPCITC01'
            ),
            array(
                'student_id' => '2019106709',
                'student_name' => 'Gervie May U. Linda',
                'student_year' => '2nd Year',
                'student_gender' => 'Female',
                'student_contact' => '09285640901',
                'student_email' => 'jvee.may@gmail.com',
                'course_id' => 'CITC-BSTCM',
                'org_id' => 'USTPCITC01'
            ),
            array(
                'student_id' => '2020170982',
                'student_name' => 'John Reele Z. Velez',
                'student_year' => '1st Year',
                'student_gender' => 'Male',
                'student_contact' => '09162568791',
                'student_email' => 'filmreele111@gmail.com',
                'course_id' => 'CITC-BSIT',
                'org_id' => 'USTPCITC01'
            ),

        ));

    }
}
