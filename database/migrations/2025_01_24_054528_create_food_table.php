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

        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->foreignId('food_category_id')->constrained()->cascadeOnDelete();
            $table->string('type'); // regular / deal
            $table->string('name');
            $table->string('phone_number');
            $table->json('time');
            $table->string('address');
            $table->string('whatsapp_number');
            $table->integer('discount');
            $table->integer('latitude');
            $table->integer('longitude');
            $table->string('iamge');
            $table->json('images')->nullable();
            $table->boolean('ad_tag')->default();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
