<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('policy_pages', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['privacy', 'terms'])->unique();
            $table->string('title', 255);
            $table->longText('body')->nullable();
            $table->timestamps();
        });

        // Seed default rows so pages always have content
        DB::table('policy_pages')->insert([
            [
                'type'       => 'privacy',
                'title'      => 'Privacy Policy',
                'body'       => "Your privacy matters to us.\n\nWe collect only the information necessary to provide our services. We never sell or share your personal data with third parties without your explicit consent.\n\nFor any privacy-related questions, please reach out to us directly.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type'       => 'terms',
                'title'      => 'Terms and Conditions',
                'body'       => "By accessing or using our services, you agree to the following terms.\n\nYou are responsible for maintaining the confidentiality of your account. We reserve the right to update these terms at any time. Continued use of the service after changes constitutes acceptance of the new terms.\n\nFor any questions regarding these terms, please contact us.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('policy_pages');
    }
};
