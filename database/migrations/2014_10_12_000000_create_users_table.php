<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id')->primary();
            $table->string('user_name');
            $table->string('user_pass');
            $table->foreign('role_id')->references('role_id')->on('roles');
            $table->foreign('student_id')->references('student_id')->on('students')->nullable();
            $table->foreign('teacher_id')->references('teacher_id')->on('teachers')->nullable();
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
        Schema::dropIfExists('users');
    }
}
