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

        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->string('name');
            $table->string('phone_number');
            $table->json('time');
            $table->string('address');
            $table->string('whatsapp_number');
            $table->integer('discount');
            $table->integer('latitude');
            $table->integer('longitude');
            $table->text('facilities');
            $table->foreignId('doctor_id')->constrained('doctors')->cascadeOnDelete();
            $table->string('image');
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
        Schema::dropIfExists('hospitals');
    }
};
