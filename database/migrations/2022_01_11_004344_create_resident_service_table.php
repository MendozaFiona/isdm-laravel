<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resident_service', function (Blueprint $table) {
            $table->id('resservice_id');
            $table->integer('service_id')->references('service_id')->on('org_service');
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
        Schema::dropIfExists('resident_service');
    }
}
