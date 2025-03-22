<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingObjectiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_objectives', function (Blueprint $table) {
            $table->id();
            $table->string('objective');
            $table->integer('duration');
            $table->integer('theory_session')->nullable();
            $table->integer('practical_session')->nullable();
            $table->string('examination')->nullable();
            $table->decimal('price', 8, 2);
            $table->text('course_details')->nullable();
            $table->text('requirement');
            $table->string('image_url')->nullable();
            $table->string('video_thumbnail_url')->nullable();
            $table->string('video_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_objectives');
    }
}
