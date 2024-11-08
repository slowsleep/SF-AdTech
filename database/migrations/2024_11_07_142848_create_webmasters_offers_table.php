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
        Schema::create('webmasters_offers', function (Blueprint $table) {
            $table->foreignId('webmaster_id')->nullable()->constrained('webmasters')->references('user_id')->nullOnDelete();
            $table->foreignId('offer_id')->nullable()->constrained('offers')->references('id')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webmasters_offers');
    }
};
