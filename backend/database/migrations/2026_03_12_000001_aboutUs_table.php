<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title');
            $table->text('hero_subtitle');
            $table->string('hero_image')->nullable();

            $table->string('mission_title')->nullable();
            $table->text('mission_description')->nullable();

            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();

            $table->string('values_title')->nullable();
            $table->text('values_description')->nullable();

            // Stats
            $table->string('stat1_number')->nullable();
            $table->string('stat1_label')->nullable();
            $table->string('stat2_number')->nullable();
            $table->string('stat2_label')->nullable();
            $table->string('stat3_number')->nullable();
            $table->string('stat3_label')->nullable();
            $table->string('stat4_number')->nullable();
            $table->string('stat4_label')->nullable();

            // CTA
            $table->string('cta_text')->nullable();
            $table->string('cta_url')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};