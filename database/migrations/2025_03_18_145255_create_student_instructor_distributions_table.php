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
        Schema::create('student_instructor_distributions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('enrolment_batch_id')
                ->constrained('enrolment_batches', 'id')
                ->onDelete('cascade');

            $table->foreignId('student_id')
                ->constrained('users', 'id')
                ->onDelete('cascade');

            $table->foreignId('instructor_id')
                ->constrained('users', 'id')
                ->onDelete('cascade');
            
            $table->foreignId('course_id')
                ->constrained('training_objectives', 'id')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_instructor_distributions');
    }
};
