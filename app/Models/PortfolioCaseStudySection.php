<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioCaseStudySection extends Model {
    protected $fillable = ['project_id','type','heading','content','bullets','image_path','layout','sort_order'];
    protected $casts = ['bullets' => 'array'];
}

