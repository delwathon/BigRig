<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFounderTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('founder', function (Blueprint $table) {
            $table->id();
            $table->string('founder_name');
            $table->string('signature')->nullable();
            $table->string('speech_title');
            $table->text('speech_content');
            $table->string('facebook_handle')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->string('linkedin_handle')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->string('founder_picture');
            $table->string('secondary_picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('founder');
    }
};
