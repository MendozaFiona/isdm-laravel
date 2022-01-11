<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resident', function (Blueprint $table) {
            $table->id('resident_id');
            $table->string('name');
            $table->string('birthdate');
            $table->string('sex');
            $table->string('contact');
            $table->string('occupation');
            $table->string('income');
            $table->string('status');
            $table->string('family_role');
            $table->integer('family_id')->references('family_id')->on('family');
            $table->integer('street_id')->references('street_id')->on('street');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resident');
    }
}
