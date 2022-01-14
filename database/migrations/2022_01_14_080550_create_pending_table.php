<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('birthdate');
            $table->string('sex');
            $table->string('contact');
            $table->string('address');
            $table->string('occupation'); //type
            $table->string('status');
            $table->string('family_role');
            $table->integer('family_id');

            $table->string('occupation_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('id_num')->nullable();
            $table->binary('pic');
            $table->integer('resident_id')->nullable();

            $table->string('proof_type');
            $table->binary('proof_pic');

            $table->string('family_name');
            $table->string('head_name');
            $table->string('head_phone');
            $table->string('family_income');

            
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pending');
    }
}
