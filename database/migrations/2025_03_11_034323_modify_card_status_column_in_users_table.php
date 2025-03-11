<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::table('users', function (Blueprint $table) {
                DB::statement("ALTER TABLE users MODIFY COLUMN card_status ENUM('not_applied', 'applied', 'pending', 'approved', 'declined') NOT NULL DEFAULT 'not_applied'");
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::table('users', function (Blueprint $table) {
                DB::statement("ALTER TABLE users MODIFY COLUMN card_status ENUM('not_applied', 'applied', 'pending', 'approved') NOT NULL DEFAULT 'not_applied'");
            });
        });
    }
};
