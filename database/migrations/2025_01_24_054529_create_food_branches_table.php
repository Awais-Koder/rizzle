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

        Schema::create('food_branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('food_id')->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->foreignId('food_category_id')->constrained()->cascadeOnDelete();
            $table->string('type')->nullable(); // regular / deal
            $table->string('name')->nullable();
            $table->string('phone_number')->nullable();
            $table->json('time')->nullable();
            $table->string('address')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->integer('discount')->nullable();
            $table->string('discount_type')->nullable();
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->string('iamge')->nullable();
            $table->json('images')->nullable();
            $table->boolean('ad_tag')->default(false);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_branches');
    }
};
