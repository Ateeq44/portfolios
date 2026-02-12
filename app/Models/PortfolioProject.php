<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PortfolioProject extends Model
{
    protected $fillable = [
        'category_id','title','slug','short_description','cover_image_path','reference_url',
        'location','partnership_period','industry','team_size','technologies',
        'case_study_content','is_published','published_at'
    ];

    protected $casts = [
        'technologies' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(PortfolioCategory::class, 'category_id');
    }
    public function teamRoles(){ return $this->hasMany(\App\Models\PortfolioProjectTeamRole::class,'project_id')->orderBy('sort_order'); }
    public function caseStudySections(){ return $this->hasMany(\App\Models\PortfolioCaseStudySection::class,'project_id')->orderBy('sort_order'); }
    public function phases(){ return $this->hasMany(\App\Models\PortfolioCaseStudyPhase::class,'project_id')->orderBy('sort_order'); }

}

