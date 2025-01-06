<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Links to users table
            $table->decimal('weight', 8, 2)->nullable(); // Weight in kilograms
            $table->decimal('height', 8, 2)->nullable(); // Height in centimeters
            $table->string('visual_impairment')->nullable(); // Type of visual impairment
            $table->string('hearing_aid')->nullable(); // Type of hearing aid
            $table->string('physical_disability')->nullable(); // Type of physical disability
            $table->string('weed')->default('No'); // Weed usage
            $table->string('alcohol')->default('Casually'); // Alcohol consumption frequency
            $table->text('prescribed_medication')->nullable(); // Details about prescribed medication
            $table->text('failed_drug_test')->nullable(); // Details about failed drug test
            $table->string('attachments')->nullable(); // Optional file attachments (e.g., medical reports)
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicals');
    }
}
