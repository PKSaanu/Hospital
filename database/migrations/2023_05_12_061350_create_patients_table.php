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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->date('Admission_Date');
            $table->time('Admission_Time');
            $table->string('Full_name');
            $table->string('BloodGroup')->nullable();;
            $table->string('Address');
            $table->string('NIC_No');
            $table->char('PHN',12);
            $table->string('Phone_No');
            $table->integer('Age');
            $table->string('Marital_Status');
            $table->string('Patient_Category');
            $table->string('ConsultantID');
            $table->char('BHT',12);
            $table->integer('Ward_No');
            $table->string('Allergies_Drugs')->nullable();;
            $table->string('Allergies_Foods')->nullable();;
            $table->string('Allergies_Specify')->nullable();;
            $table->string('Status');
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
        Schema::dropIfExists('patients');
    }
};
