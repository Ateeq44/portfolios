<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('portfolio_project_team_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('portfolio_projects')->cascadeOnDelete();
            $table->string('role');          // e.g. Project Manager
            $table->unsignedInteger('count')->default(1); // e.g. 4
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('portfolio_project_team_roles');
    }
};
