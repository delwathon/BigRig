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
        Schema::create('payment_gateway_configs', function (Blueprint $table) {
            $table->id();
            $table->string('name');                    // REQUIRED (gateway name like Paystack, Stripe)
            $table->string('public_key')->nullable(); // Nullable if not all gateways use it yet
            $table->text('secret_key')->nullable(); // Same logic as above
            $table->string('merchant_email')->nullable(); // Same logic as above
            $table->boolean('sandbox')->default(true); // Default to test mode
            $table->boolean('is_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_gateway_configs');
    }
};
