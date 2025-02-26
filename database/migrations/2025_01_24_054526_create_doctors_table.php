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

        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->foreignId('doctor_category_id')->constrained()->cascadeOnDelete();
            $table->integer('fees')->nullable();
            $table->string('name')->nullable();
            $table->text('reviews')->nullable();
            $table->string('short_description')->nullable();
            $table->text('about_me')->nullable();
            $table->text('experience')->nullable();
            $table->json('schedule')->nullable();
            $table->string('address')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->json('images')->nullable();
            $table->integer('latitude')->nullable();
            $table->integer('longitude')->nullable();
            $table->string('video_youtube_link')->nullable();
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
        Schema::dropIfExists('doctors');
    }
};
