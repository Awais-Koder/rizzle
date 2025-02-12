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
            $table->integer('fees');
            $table->string('name');
            $table->text('reviews');
            $table->string('short_description');
            $table->text('about_me');
            $table->text('experience');
            $table->json('schedule');
            $table->string('address');
            $table->string('whatsapp');
            $table->string('phone');
            $table->string('image');
            $table->json('images')->nullable();
            $table->integer('latitude');
            $table->integer('longitude');
            $table->string('video_youtube_link');
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
