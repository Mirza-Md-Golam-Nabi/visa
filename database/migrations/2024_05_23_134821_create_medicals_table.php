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
        Schema::create('medicals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passenger_id');
            $table->unsignedSmallInteger('medical_center_id')->nullable();
            $table->string('medical_serial_no')->nullable();
            $table->date('medical_exam_issue_date')->nullable();
            $table->date('medical_report_expire_date')->nullable();
            $table->string('medical_status')->nullable();
            $table->string('mofa_number')->nullable();
            $table->string('current_status')->nullable();
            $table->string('comment')->nullable();
            $table->date('bio_submit_date')->nullable();
            $table->string('bio_submit_status')->nullable();
            $table->date('calling_date')->nullable();
            $table->string('calling_status')->nullable();
            $table->string('medical_receipt')->nullable();
            $table->string('medical_certificate')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicals');
    }
};
