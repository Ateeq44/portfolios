<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;

class PortfolioController extends Controller
{
    public function index()
    {
        $items = PortfolioProject::with('category')
        ->where('is_published', true)
        ->orderByDesc('published_at')
        ->paginate(9);

        return view('portfolios.index', compact('items'));
    }

    public function show(PortfolioProject $project)
    {
        abort_unless($project->is_published, 404);
        $project->load([
            'category',
            'teamRoles',
            'caseStudySections',
            'phases'
        ]);

        return view('portfolios.show', compact('project'));
    }
    public function about()
    {
        return view('portfolios.about');
    }

    public function contact()
    {
        return view('portfolios.contact');
    }
}
