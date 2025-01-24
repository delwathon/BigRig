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
            $table->foreignId('instructor_id')
                  ->constrained('instructors')
                  ->onDelete('cascade');
            $table->foreignId('objective_id')
                  ->constrained('traning_objectives')
                  ->onDelete('cascade');
            $table->foreignId('curriculum_id')
                  ->constrained('curriculum')
                  ->onDelete('cascade');
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
