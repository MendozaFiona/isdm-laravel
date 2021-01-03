<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigInteger('student_id')->primary();
            $table->string('student_name');
            $table->string('student_year');
            $table->string('student_gender');
            $table->string('student_contact');
            $table->string('student_email');
            $table->foreign('course_id')->references('course_id')->on('courses');
            $table->foreign('org_id')->references('org_id')->on('organizations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
