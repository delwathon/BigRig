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
            $table->id(); // Auto-incrementing primary key (id)
            $table->string('objective'); // Name of the training objective
            $table->text('requirement'); // Description or requirement for the objective
            $table->decimal('price', 8, 2); // Price of the training, e.g., 99.99
            $table->integer('duration'); // Duration of the training in hours
            $table->string('image_url')->nullable(); // Path or filename for the attachment (nullable)
            $table->text('course_details')->nullable();
            $table->text('learning_objective')->nullable();
            $table->timestamps(); // Created and updated timestamp columns
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
