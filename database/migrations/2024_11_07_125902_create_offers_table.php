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
        Schema::create('offers', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('advertiser_id')->nullable()->constrained('advertisers')->references('user_id')->nullOnDelete();
            $table->string('title');
            $table->float('price');
            $table->string('url');
            $table->foreignId('theme_id')->nullable()->constrained('site_themes')->nullOnDelete();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
