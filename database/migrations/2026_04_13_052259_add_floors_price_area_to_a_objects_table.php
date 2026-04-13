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
        Schema::table('a_objects', function (Blueprint $table) {
            $table->unsignedInteger('floors')->nullable()->after('content');
            $table->unsignedInteger('price_per_sqm')->nullable()->after('floors');
            $table->unsignedInteger('area')->nullable()->after('price_per_sqm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('a_objects', function (Blueprint $table) {
            $table->dropColumn(['floors', 'price_per_sqm', 'area']);
        });
    }
};
