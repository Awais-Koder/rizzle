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
        Schema::table('food', function (Blueprint $table) {
            $table->string('deal_image')->nullable();
        });
        Schema::table('food_branches', function (Blueprint $table) {
            $table->string('deal_image')->nullable();
        });
        Schema::table('electronics', function (Blueprint $table) {
            $table->string('deal_image')->nullable();
            $table->string('type')->nullable();
        });
        Schema::table('electronic_branches', function (Blueprint $table) {
            $table->string('deal_image')->nullable();
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('food', function (Blueprint $table) {
            $table->dropColumn('deal_image');
        });
        Schema::table('food_branches', function (Blueprint $table) {
            $table->dropColumn('deal_image');
        });
        Schema::table('electronics', function (Blueprint $table) {
            $table->dropColumn('deal_image');
            $table->dropColumn('type');
        });
        Schema::table('electronic_branches', function (Blueprint $table) {
            $table->dropColumn('deal_image');
            $table->dropColumn('type');
        });
    }
};
