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
        Schema::create('passports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passenger_id');
            $table->string('previous_passport')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('passport_type', 30)->nullable();
            $table->date('passport_issue_date')->nullable();
            $table->string('passport_issue_place')->nullable();
            $table->date('passport_expire_date')->nullable();
            $table->string('passport_picture')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index('passenger_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passports');
    }
};
