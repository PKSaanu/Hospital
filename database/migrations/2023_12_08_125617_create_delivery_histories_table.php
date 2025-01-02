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
        Schema::create('delivery_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Patient_ID');
            $table->string('Delivery_Hx');
            $table->string('Time');
            $table->string('Date');
            $table->string('Birth_Weight');
            $table->string('Gender');
            $table->String('ACMN');
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
        Schema::dropIfExists('delivery_histories');
    }
};
