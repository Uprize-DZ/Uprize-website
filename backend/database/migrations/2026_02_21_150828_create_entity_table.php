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
        Schema::create('entity', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->default('Default');
            $table->string('description', 512)->nullable();
            $table->string('slogan', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('phone', 21)->nullable();
            $table->string('address', 512)->nullable();
            //scocial media links
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('tiktok_url')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entity');
    }
};
