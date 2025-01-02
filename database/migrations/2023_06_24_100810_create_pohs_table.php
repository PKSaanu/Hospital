<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pohs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Patient_ID');
            $table->string('pregnancy');
            $table->string('antenatal_complications')->nullable();;
            $table->string('place_of_delivery')->nullable();;
            $table->string('mode_of_delivery')->nullable();
            $table->string('outcome')->nullable();
            $table->integer('birth_weight')->nullable();
            $table->string('postnatal_complication')->nullable();
            $table->String('sex')->nullable();
            $table->integer('age')->nullable();
            $table->foreign('Patient_ID')->references('id')->on('patients');
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
        Schema::dropIfExists('pohs');
    }
};
