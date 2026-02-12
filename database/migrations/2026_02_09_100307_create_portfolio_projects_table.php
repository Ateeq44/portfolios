<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('portfolio_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('portfolio_categories')->cascadeOnDelete();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description', 500)->nullable();

            $table->string('cover_image_path')->nullable(); // public/uploads/...
            $table->string('reference_url')->nullable();

            // Case study meta (dixeam style)
            $table->string('location')->nullable();
            $table->string('partnership_period')->nullable();
            $table->string('industry')->nullable();
            $table->string('team_size')->nullable();
            $table->json('technologies')->nullable();

            // main content
            $table->longText('case_study_content')->nullable(); // HTML from editor

            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('portfolio_projects');
    }
};
