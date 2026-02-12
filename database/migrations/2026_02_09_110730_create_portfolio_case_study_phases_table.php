<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('portfolio_case_study_phases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('portfolio_projects')->cascadeOnDelete();

            $table->string('title');      // Phase 1
            $table->string('subtitle')->nullable(); // Core Platform Development
            $table->json('bullets')->nullable();    // lines -> bullet list

            $table->string('image_path')->nullable(); // optional
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('portfolio_case_study_phases');
    }
};

