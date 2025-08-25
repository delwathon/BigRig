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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->enum('type', ['general', 'course', 'batch', 'urgent']);
            $table->enum('priority', ['low', 'medium', 'high']);
            $table->foreignId('course_id')->nullable()->constrained('training_objectives')->onDelete('cascade');
            $table->foreignId('batch_id')->nullable()->constrained('enrolment_batches')->onDelete('cascade');
            $table->foreignId('created_by')->constrained('users');
            $table->boolean('is_active')->default(true);
            $table->datetime('publish_date')->nullable();
            $table->datetime('expiry_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
