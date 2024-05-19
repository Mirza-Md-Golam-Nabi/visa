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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('agent_type', 20);
            $table->string('agent_group')->nullable();
            $table->string('name')->nullable();
            $table->string('nid_no', 20)->nullable();
            $table->string('gender', 8)->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('village_house')->nullable();
            $table->string('road_block_sector')->nullable();
            $table->string('country', 15)->nullable();
            $table->unsignedTinyInteger('division_id')->nullable();
            $table->unsignedTinyInteger('district_id')->nullable();
            $table->string('police_station')->nullable();
            $table->string('email')->nullable();
            $table->string('post_office')->nullable();
            $table->string('contact_no', 15)->nullable();
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
        Schema::dropIfExists('agents');
    }
};
