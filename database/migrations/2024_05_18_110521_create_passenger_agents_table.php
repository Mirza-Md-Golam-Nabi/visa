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
        Schema::create('passenger_agents', function (Blueprint $table) {
            $table->id();
            $table->string('agent_group')->nullable();
            $table->string('name')->nullable();
            $table->string('nid_no')->nullable();
            $table->string('gender')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('village_house')->nullable();
            $table->string('road_block_sector')->nullable();
            $table->string('country')->nullable();
            $table->string('division')->nullable();
            $table->string('district')->nullable();
            $table->string('police_station')->nullable();
            $table->string('email')->nullable();
            $table->string('post_office')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('emergency_name_phone')->nullable();
            $table->string('agent_image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passenger_agents');
    }
};
