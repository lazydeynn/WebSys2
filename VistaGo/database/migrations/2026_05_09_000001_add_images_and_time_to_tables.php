<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('category');
        });

        Schema::table('guides', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('daily_rate');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar_path')->nullable()->after('role');
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->time('visit_time')->nullable()->after('visit_date');
        });
    }

    public function down(): void
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });

        Schema::table('guides', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar_path');
        });

        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('visit_time');
        });
    }
};
