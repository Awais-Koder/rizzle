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
        Schema::table('travel', function (Blueprint $table) {
            $table->string('travel_type')->nullable();
        });
        Schema::table('travel_branches', function (Blueprint $table) {
            $table->string('travel_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('travel', function (Blueprint $table) {
            $table->dropColumn('travel_type');
        });
        Schema::table('travel_branches', function (Blueprint $table) {
            $table->dropColumn('travel_type');
        });
    }
};
