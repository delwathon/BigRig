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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrolment_batch_id')->nullable()->constrained('enrolment_batches')->onDelete('set null');
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('mobileNumber')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->foreignId('role_id')->nullable()->constrained('roles')->onDelete('set null'); // ✅ FIXED
            $table->string('profile_photo_path', 2048)->nullable();
            $table->boolean('user_active')->default(false);
            $table->boolean('website_visibility')->default(false);
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
