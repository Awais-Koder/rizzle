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

        Schema::create('pharmacies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('phone_number');
            $table->json('time');
            $table->string('address');
            $table->string('whatsapp_number')->nullable();
            $table->integer('discount')->nullable();
            $table->string('discount_type')->nullable();
            $table->integer('latitude');
            $table->integer('longitude');
            $table->string('image');
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
        Schema::dropIfExists('pharmacies');
    }
};
