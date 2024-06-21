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
        Schema::create('courses', function (Blueprint $table) {
            $table->bigInteger('course_id')->primary();
            $table->string('course_name')->nullable();
            $table->string('course_code', 30)->nullable();
            $table->bigInteger('semester_id')->index()->nullable();
            $table->foreign('semester_id')->references('semester_id')->on('semesters')->onDelete('cascade');
            $table->integer('credit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
