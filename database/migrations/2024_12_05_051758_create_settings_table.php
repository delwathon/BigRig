<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('site_tagline')->nullable();
            $table->text('site_description');
            $table->text('site_keywords');
            $table->text('headquarters');
            $table->string('business_email');
            $table->string('secondary_email')->nullable();
            $table->string('business_contact');
            $table->string('secondary_contact')->nullable();
            $table->string('dark_theme_logo');
            $table->string('light_theme_logo');
            $table->string('favicon');
            $table->string('facebook_handle')->nullable();
            $table->string('twitter_handle')->nullable();
            $table->string('instagram_handle')->nullable();
            $table->string('youtube_handle')->nullable();
            $table->string('tiktok_handle')->nullable();
            $table->string('linkedin_handle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
