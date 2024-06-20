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
        Schema::create('attendance', function (Blueprint $table) {
            $table->bigIncrements('attendance_id');
            $table->bigInteger('student_id')->index()->nullable();
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->bigInteger('course_id')->index()->nullable();
            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade');
            $table->date('attendance_date')->nullable();
            $table->enum('attendance_status', ['present', 'late', 'excused', 'absent'])->nullable();
            $table->string('section')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
