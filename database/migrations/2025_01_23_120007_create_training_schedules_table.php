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
        Schema::create('training_schedules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('batch_id')
                  ->constrained('enrolment_batches', 'id')
                  ->onDelete('cascade');

            $table->foreignId('instructor_id')
                  ->constrained('users', 'id')
                  ->onDelete('cascade');

            $table->foreignId('course_id')
                  ->constrained('training_objectives', 'id')
                  ->onDelete('cascade');

            $table->foreignId('topic_id')
                  ->constrained('curriculum', 'id')
                  ->onDelete('cascade');

            $table->enum('session_type', ['theory', 'practical'])->default('theory');

            $table->json('students');

            $table->date('schedule_date');

            $table->time('time_start');

            $table->time('time_stop');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_schedules');
    }
};
