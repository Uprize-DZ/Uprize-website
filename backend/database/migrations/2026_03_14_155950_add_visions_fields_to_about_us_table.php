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
            $table->boolean('mission_is_active')->default(true);
            $table->string('mission_image')->nullable();
            
            $table->boolean('vision_is_active')->default(true);
            $table->string('vision_image')->nullable();
            
            $table->boolean('values_is_active')->default(true);
            $table->string('values_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn([
                'mission_is_active', 'mission_image',
                'vision_is_active', 'vision_image',
                'values_is_active', 'values_image',
            ]);
        });
    }
};
