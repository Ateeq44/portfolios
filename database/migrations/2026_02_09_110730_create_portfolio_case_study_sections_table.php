<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('portfolio_case_study_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('portfolio_projects')->cascadeOnDelete();

            // fixed types so layout stays consistent like dixeam
            $table->string('type'); // competitive, problem, solution, technology, conclusion, challenge, next_steps

            $table->string('heading')->nullable(); // default headings
            $table->longText('content')->nullable(); // paragraph content
            $table->json('bullets')->nullable();     // for lists (each line -> bullet)

            $table->string('image_path')->nullable(); // public/uploads/portfolio/case-studies/...
            $table->string('layout')->default('image_right'); 
            // layouts: image_left, image_right, stacked

            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->unique(['project_id','type']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('portfolio_case_study_sections');
    }
};
