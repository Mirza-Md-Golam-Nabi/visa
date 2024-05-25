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
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->string('agent');
            $table->string('passenger_name');
            $table->string('nid_no');
            $table->string('gender', 30)->nullable();
            $table->date('dob')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('religion', 30)->nullable();
            $table->string('marital_status', 30)->nullable();
            $table->string('target_country')->nullable();
            $table->string('passenger_type')->nullable();
            $table->string('village_house')->nullable();
            $table->unsignedTinyInteger('division_id')->nullable();
            $table->unsignedTinyInteger('district_id')->nullable();
            $table->string('police_station')->nullable();
            $table->string('post_office')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('current_status')->nullable();
            $table->string('emergency_name_contact')->nullable();
            $table->string('recruiting_agent')->nullable();
            $table->string('passenger_picture')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passengers');
    }
};
