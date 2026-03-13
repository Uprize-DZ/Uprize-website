<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('how_we_work', function (Blueprint $table) {
            $table->id();
            $table->string('step_number');
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable(); // SVG icon name or path
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('how_we_work');
    }
};
