<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('sub_title')->nullable();
            $table->decimal('fee', 10, 2)->nullable();
            $table->string('featured_image')->nullable();
            $table->string('promo_video_url')->nullable();
            $table->longText('overview')->nullable();
            $table->longText('content')->nullable();
            $table->longText('schedule')->nullable();
            $table->string('registration_url')->nullable();
            $table->string('brochure_path')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
