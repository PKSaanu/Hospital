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
        Schema::create('treatments', function (Blueprint $table) {
            //$table->id();
            $table->unsignedBigInteger('Patient_ID');
            $table->integer('Visit_No');
            $table->date('Date');
            $table->string('Staff_Name');
            $table->string('Basic_Complaint')->nullable();;
            $table->string('Complaints')->nullable();;
            $table->string('Exam_Blood');
            $table->string('Exam_Pulse');
            $table->string('Symphysis_fundal_height')->nullable();;
            $table->string('Head')->nullable();;
            $table->string('Head2')->nullable();;
            $table->string('Exam_Other')->nullable();;
            $table->string('Manage_WBC')->nullable();;
            $table->string('Manage_Hb')->nullable();;
            $table->string('Manage_p_t')->nullable();;
            $table->string('Manage_WhiteCells')->nullable();;
            $table->string('Manage_Redcells')->nullable();;
            $table->string('Manage_Protein')->nullable();;
            $table->string('Manage_K')->nullable();;
            $table->string('Manage_Na')->nullable();;
            $table->string('Manage_CRP')->nullable();;
            $table->string('Manage_FBS')->nullable();;
            $table->string('Manage_AB')->nullable();;
            $table->string('Manage_AL')->nullable();;
            $table->string('Manage_AD')->nullable();;
            $table->string('Manage_Other')->nullable();;
            $table->string('Basic_Decision');
            $table->string('Decisions')->nullable();;
            $table->foreign('Patient_ID')->references('id')->on('patients');
            $table->timestamps();
            $table->primary(['Patient_ID', 'Visit_No', 'Date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatments');
    }
};
