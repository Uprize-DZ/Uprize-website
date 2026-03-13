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
            $table->enum('media_type', ['image', 'video'])->default('image')->after('hero_image');
            $table->string('media_url')->nullable()->after('media_type');
            $table->string('media_public_id')->nullable()->after('media_url');
            $table->string('label')->nullable()->after('media_public_id');
            $table->string('bullet1')->nullable()->after('label');
            $table->string('bullet2')->nullable()->after('bullet1');
            $table->string('bullet3')->nullable()->after('bullet2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn([
                'media_type',
                'media_url',
                'media_public_id',
                'label',
                'bullet1',
                'bullet2',
                'bullet3',
            ]);
        });
    }
};
