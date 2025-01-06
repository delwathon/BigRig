<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutCompanyTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about_company', function (Blueprint $table) {
            $table->id();
            $table->string('banner_title');
            $table->string('banner_picture');
            $table->string('history_title');
            $table->float('training_hours', 3, 1)->nullable();
            $table->text('company_history');
            $table->text('mission_statement');
            $table->integer('students_count')->nullable();
            $table->integer('years_of_existence')->nullable();
            $table->integer('instructors_count')->nullable();
            $table->float('pass_rate', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_company');
    }
}
