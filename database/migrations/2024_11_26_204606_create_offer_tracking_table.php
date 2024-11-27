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
        Schema::create('offer_tracking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offer_subscription_id')->constrained('offer_subscriptions')->references('id')->cascadeOnDelete();
            $table->integer('clicks')->default(0);
            $table->timestamps();

            $table->unique(['offer_subscription_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_tracking');
    }
};
