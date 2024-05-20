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
            $table->string('country')->nullable();
            $table->unsignedInteger('passenger_agent_id')->nullable();
            $table->unsignedInteger('service_agent_id')->nullable();
            $table->string('visa_no')->nullable();
            $table->string('category')->nullable();
            $table->unsignedTinyInteger('quantity')->nullable();
            $table->date('visa_date')->nullable();
            $table->string('sponsor_name')->nullable();
            $table->string('sponsor_id')->nullable();
            $table->string('visa_issue_place')->nullable();
            $table->string('qualification')->nullable();
            $table->string('profession')->nullable();
            $table->string('travel_purpose', 30)->nullable();
            $table->string('musaned_no')->nullable();
            $table->string('wakala_no')->nullable();
            $table->string('group_no')->nullable();
            $table->string('copile_name_arabic')->nullable();
            $table->string('comment')->nullable();
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
