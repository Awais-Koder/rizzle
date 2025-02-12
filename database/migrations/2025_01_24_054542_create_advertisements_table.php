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
        Schema::disableForeignKeyConstraints();

        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->json('home_banner');
            $table->json('sponsor_video');
            $table->json('education_ad');
            $table->json('travel_ad');
            $table->json('food_ad');
            $table->json('shop_ad');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
