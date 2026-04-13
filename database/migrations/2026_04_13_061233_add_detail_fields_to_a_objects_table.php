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
            $table->text('detail_description')->nullable()->after('description');
            $table->string('left_image')->nullable()->after('detail_description');
            $table->json('features')->nullable()->after('left_image');
            $table->text('big_description')->nullable()->after('features');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('a_objects', function (Blueprint $table) {
            $table->dropColumn(['detail_description', 'left_image', 'features', 'big_description']);
        });
    }
};
