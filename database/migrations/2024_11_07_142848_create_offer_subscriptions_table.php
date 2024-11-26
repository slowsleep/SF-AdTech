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
        Schema::create('offer_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('webmaster_id')->nullable()->constrained('webmasters')->references('user_id')->nullOnDelete();
            $table->foreignId('offer_id')->nullable()->constrained('offers')->references('id')->nullOnDelete();
            $table->string('ref_link_uuid');
            $table->timestamps();

            $table->unique(['webmaster_id', 'offer_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offer_subscriptions');
    }
};
