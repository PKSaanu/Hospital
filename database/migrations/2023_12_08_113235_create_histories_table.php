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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Patient_ID');
            $table->string('MHx');
            $table->string('FHx');
            $table->string('SHx');
            $table->string('Risk_Factor');
            $table->string('BMI');
            $table->String('LMP');
            $table->string('EDD');
            $table->String('Parity');
            $table->String('Past_obs_Hx');
            $table->String('Past_obs_complication');
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
        Schema::dropIfExists('histories');
    }
};
