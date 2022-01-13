<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccupationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupation', function (Blueprint $table) {
            $table->id('id');
            $table->string('type');
            $table->string('occupation_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('id_num')->nullable();
            $table->binary('pic');
            $table->integer('resident_id')->references('resident_id')->on('resident');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('occupation');
    }
}
