<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('passenger_visas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passenger_id');
            $table->unsignedBigInteger('visa_info_id');
            $table->date("visa_issue_date")->nullable();
            $table->string("mofa_number")->nullable();
            $table->date("stamp_submit_date")->nullable();
            $table->date("visa_stamping_date")->nullable();
            $table->string("embassy_attest")->nullable();
            $table->string("finger_status")->nullable();
            $table->string("police_clearance_number")->nullable();
            $table->string("musanad")->nullable();
            $table->date("delivery_date")->nullable();
            $table->string("recruiting_agency")->nullable();
            $table->string("sponsor_name_arabic")->nullable();
            $table->string("sponsor_name_english")->nullable();
            $table->string("profession_arabic")->nullable();
            $table->string("profession_english")->nullable();
            $table->string("salary")->nullable();
            $table->string("visa_stamp")->nullable();
            $table->string("ministry_permission")->nullable();
            $table->string("okala_number")->nullable();
            $table->string("current_status")->nullable();
            $table->string("visa_status")->nullable();
            $table->string("enjaz_visa_copy")->nullable();
            $table->string("visa_stamp_copy")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passenger_visas');
    }
};
