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
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('mofa_id')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('previous_nationality')->nullable();
            $table->string('present_nationality')->nullable();
            $table->unsignedTinyInteger('gender_id')->nullable();
            $table->unsignedTinyInteger('marital_status_id')->nullable();
            $table->string('sect')->nullable();
            $table->unsignedTinyInteger('religion_id')->nullable();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->string('phone', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_infos');
    }
};
