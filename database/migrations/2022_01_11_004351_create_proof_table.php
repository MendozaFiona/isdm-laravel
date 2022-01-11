<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProofTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proof', function (Blueprint $table) {
            $table->id('proof_id');
            $table->string('proof_type');
            $table->binary('proof_pic');
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
        Schema::dropIfExists('proof');
    }
}
