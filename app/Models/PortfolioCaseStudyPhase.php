<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioCaseStudyPhase extends Model {
    protected $fillable = ['project_id','title','subtitle','bullets','image_path','sort_order'];
    protected $casts = ['bullets' => 'array'];
}

