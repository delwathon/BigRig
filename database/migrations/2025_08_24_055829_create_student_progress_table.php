<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('student_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('training_objectives')->onDelete('cascade');
            $table->foreignId('topic_id')->nullable()->constrained('curriculum')->onDelete('set null');
            $table->enum('type', ['theory', 'practical']);
            $table->boolean('completed')->default(false);
            $table->integer('score')->nullable();
            $table->integer('hours_completed')->default(0);
            $table->date('completion_date')->nullable();
            $table->text('feedback')->nullable();
            $table->timestamps();

            // Unique constraint to prevent duplicate progress entries
            $table->unique(['student_id', 'course_id', 'topic_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('student_progress');
    }
};
