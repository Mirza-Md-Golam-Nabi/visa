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
        Schema::create('visa_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_info_id');
            $table->string('visa_no')->nullable();
            $table->date('visa_date')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_id')->nullable();
            $table->string('visa_issue_place')->nullable();
            $table->string('qualification')->nullable();
            $table->string('profession')->nullable();
            $table->string('travel_purpose', 30)->nullable();
            $table->string('musaned_no')->nullable();
            $table->string('wakala_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_infos');
    }
};
