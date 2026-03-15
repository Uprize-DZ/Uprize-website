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
        Schema::table('about_us', function (Blueprint $table) {
            $table->boolean('stat1_is_active')->default(false);
            $table->boolean('stat2_is_active')->default(false);
            $table->boolean('stat3_is_active')->default(false);
            $table->boolean('stat4_is_active')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn([
                'stat1_is_active',
                'stat2_is_active',
                'stat3_is_active',
                'stat4_is_active',
            ]);
        });
    }
};
