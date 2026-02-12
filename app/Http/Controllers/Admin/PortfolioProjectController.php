<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;
use App\Models\PortfolioProjectTeamRole;
use App\Models\PortfolioCaseStudySection;
use App\Models\PortfolioCaseStudyPhase;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class PortfolioProjectController extends Controller
{
    /**
     * Fixed section types (same idea as dixeam)
     */
    private function defaultSections(): array
    {
        return [
            'competitive' => 'Competitive Environment',
            'problem'     => 'Problem Statement',
            'solution'    => 'Solution and Objectives',
            'technology'  => 'Technology Planning',
            'conclusion'  => 'Conclusion and Results',
            'challenge'   => 'Key Challenge',
            'next_steps'  => 'Next Steps',
        ];
    }

    public function index()
    {
        $items = PortfolioProject::with('category')
            ->orderByDesc('id')
            ->paginate(20);

        return view('admin.portfolio_projects.index', compact('items'));
    }

    public function create()
    {
        $categories = PortfolioCategory::where('is_active', true)->orderBy('sort_order')->get();
        $defaultSections = $this->defaultSections();

        return view('admin.portfolio_projects.create', compact('categories', 'defaultSections'));
    }

    public function edit(PortfolioProject $portfolio_project)
    {
        $categories = PortfolioCategory::where('is_active', true)->orderBy('sort_order')->get();
        $defaultSections = $this->defaultSections();

        $portfolio_project->load(['teamRoles', 'caseStudySections', 'phases']);

        return view('admin.portfolio_projects.edit', [
            'item' => $portfolio_project,
            'categories' => $categories,
            'defaultSections' => $defaultSections,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateBase($request);

        $slug = $this->uniqueSlug($data['title']);

        // Cover upload
        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $coverPath = $this->uploadPublicImage($request->file('cover_image'), 'uploads/portfolio/projects');
        }

        $techArray = $this->parseTechnologies($data['technologies'] ?? null);

        $isPublished = $request->boolean('is_published');

        $project = PortfolioProject::create([
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'slug' => $slug,
            'short_description' => $data['short_description'] ?? null,
            'reference_url' => $data['reference_url'] ?? null,
            'cover_image_path' => $coverPath,

            'location' => $data['location'] ?? null,
            'partnership_period' => $data['partnership_period'] ?? null,
            'industry' => $data['industry'] ?? null,

            'technologies' => $techArray ?: null,

            'is_published' => $isPublished,
            'published_at' => $isPublished ? now() : null,
        ]);

        // Save nested
        $this->syncTeamRoles($project, $request->input('team_roles', []));
        $this->syncSections($project, $request);
        $this->syncPhases($project, $request);

        return redirect()->route('admin.portfolio-projects.index')->with('success', 'Project created');
    }

    public function update(Request $request, PortfolioProject $portfolio_project)
    {
        $data = $this->validateBase($request);

        $slug = $this->uniqueSlug($data['title'], $portfolio_project->id);

        // Cover upload (replace if new)
        $coverPath = $portfolio_project->cover_image_path;
        if ($request->hasFile('cover_image')) {
            if ($coverPath) {
                $this->deletePublicFile($coverPath);
            }
            $coverPath = $this->uploadPublicImage($request->file('cover_image'), 'uploads/portfolio/projects');
        }

        $techArray = $this->parseTechnologies($data['technologies'] ?? null);

        $isPublished = $request->boolean('is_published');

        $portfolio_project->update([
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'slug' => $slug,
            'short_description' => $data['short_description'] ?? null,
            'reference_url' => $data['reference_url'] ?? null,
            'cover_image_path' => $coverPath,

            'location' => $data['location'] ?? null,
            'partnership_period' => $data['partnership_period'] ?? null,
            'industry' => $data['industry'] ?? null,

            'technologies' => $techArray ?: null,

            'is_published' => $isPublished,
            'published_at' => $isPublished ? ($portfolio_project->published_at ?? now()) : null,
        ]);

        // Reload relations before replacing (for old image deletion)
        $portfolio_project->load(['teamRoles', 'caseStudySections', 'phases']);

        // Save nested
        $this->syncTeamRoles($portfolio_project, $request->input('team_roles', []));
        $this->syncSections($portfolio_project, $request);
        $this->syncPhases($portfolio_project, $request);

        return redirect()->route('admin.portfolio-projects.index')->with('success', 'Project updated');
    }

    public function destroy(PortfolioProject $portfolio_project)
    {
        // delete related images from public if you want
        $portfolio_project->load(['caseStudySections', 'phases']);

        if ($portfolio_project->cover_image_path) {
            $this->deletePublicFile($portfolio_project->cover_image_path);
        }

        foreach ($portfolio_project->caseStudySections as $sec) {
            if ($sec->image_path) $this->deletePublicFile($sec->image_path);
        }

        foreach ($portfolio_project->phases as $ph) {
            if ($ph->image_path) $this->deletePublicFile($ph->image_path);
        }

        $portfolio_project->delete();

        return back()->with('success', 'Project deleted');
    }

    // ---------------------------
    // Validation
    // ---------------------------

    private function validateBase(Request $request): array
    {
        return $request->validate([
            'category_id' => ['required', 'exists:portfolio_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'reference_url' => ['nullable', 'url', 'max:255'],

            'location' => ['nullable', 'string', 'max:255'],
            'partnership_period' => ['nullable', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:255'],

            'technologies' => ['nullable', 'string'],

            'cover_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_published' => ['nullable'],

            // nested arrays (optional, but helps avoid weird inputs)
            'team_roles' => ['nullable', 'array'],
            'team_roles.*.role' => ['nullable', 'string', 'max:255'],
            'team_roles.*.count' => ['nullable', 'integer', 'min:1'],

            'sections' => ['nullable', 'array'],
            'phases' => ['nullable', 'array'],
        ]);
    }

    // ---------------------------
    // Nested Save: Team Roles
    // ---------------------------

    private function syncTeamRoles(PortfolioProject $project, array $rows): void
    {
        // wipe & recreate (simple + reliable)
        PortfolioProjectTeamRole::where('project_id', $project->id)->delete();

        $sort = 0;
        foreach ($rows as $row) {
            $role = trim($row['role'] ?? '');
            $count = (int)($row['count'] ?? 0);

            if ($role === '' || $count <= 0) continue;

            PortfolioProjectTeamRole::create([
                'project_id' => $project->id,
                'role' => $role,
                'count' => $count,
                'sort_order' => $sort++,
            ]);
        }
    }

    // ---------------------------
    // Nested Save: Sections (fixed types)
    // ---------------------------

    private function syncSections(PortfolioProject $project, Request $request): void
    {
        $types = array_keys($this->defaultSections());

        foreach ($types as $type) {
            $heading = $request->input("sections.$type.heading");
            $content = $request->input("sections.$type.content");
            $layout  = $request->input("sections.$type.layout", 'image_right');

            // bullets: textarea lines
            

            // existing section
            $section = PortfolioCaseStudySection::where('project_id', $project->id)
                ->where('type', $type)
                ->first();

            if (!$section) {
                $section = new PortfolioCaseStudySection();
                $section->project_id = $project->id;
                $section->type = $type;
            }

            // image upload (nested file)
            $imgFile = $request->file("sections.$type.image");
            if ($imgFile instanceof UploadedFile) {
                if ($section->image_path) {
                    $this->deletePublicFile($section->image_path);
                }
                $section->image_path = $this->uploadPublicImage($imgFile, 'uploads/portfolio/case-studies');
            }

            $section->heading = $heading ?: ($this->defaultSections()[$type] ?? ucfirst($type));
            $section->content = $content ?: null;
            $section->layout  = in_array($layout, ['image_left','image_right','stacked']) ? $layout : 'image_right';
            $section->sort_order = $this->sectionSort($type);

            // اگر user نے اس section میں کچھ بھی fill نہیں کیا (heading default کے علاوہ)، پھر بھی save ٹھیک ہے
            $section->save();
        }
    }

    private function sectionSort(string $type): int
    {
        $map = [
            'competitive' => 10,
            'problem' => 20,
            'solution' => 30,
            'technology' => 40,
            'conclusion' => 50,
            'challenge' => 60,
            'next_steps' => 70,
        ];
        return $map[$type] ?? 999;
    }

    // ---------------------------
    // Nested Save: Phases (dynamic)
    // ---------------------------

    private function syncPhases(PortfolioProject $project, Request $request): void
    {
        // delete old (and images)
        $old = PortfolioCaseStudyPhase::where('project_id', $project->id)->get();
        foreach ($old as $ph) {
            if ($ph->image_path) $this->deletePublicFile($ph->image_path);
        }
        PortfolioCaseStudyPhase::where('project_id', $project->id)->delete();

        $rows = $request->input('phases', []);
        if (!is_array($rows)) return;

        $sort = 0;
        foreach ($rows as $i => $row) {
            $title = trim($row['title'] ?? '');
            $subtitle = trim($row['subtitle'] ?? '');
            $bulText = $row['bullets_text'] ?? '';
            $bullets = $this->parseBullets($bulText);

            if ($title === '' && $subtitle === '' && empty($bullets)) {
                // empty row skip
                continue;
            }

            $phase = new PortfolioCaseStudyPhase();
            $phase->project_id = $project->id;
            $phase->title = $title ?: ('Phase ' . ($sort + 1));
            $phase->subtitle = $subtitle ?: null;
            $phase->bullets = !empty($bullets) ? $bullets : null;
            $phase->sort_order = $sort;

            // nested phase image file: phases[0][image]
            $imgFile = $request->file("phases.$i.image");
            if ($imgFile instanceof UploadedFile) {
                $phase->image_path = $this->uploadPublicImage($imgFile, 'uploads/portfolio/phases');
            }

            $phase->save();
            $sort++;
        }
    }

    // ---------------------------
    // Helpers
    // ---------------------------

    private function uniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $slug = Str::slug($title);
        $base = $slug;
        $i = 1;

        while (
            PortfolioProject::where('slug', $slug)
                ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base . '-' . $i++;
        }

        return $slug;
    }

    private function parseTechnologies(?string $csv): array
    {
        if (!$csv) return [];
        return array_values(array_filter(array_map('trim', explode(',', $csv))));
    }

    private function parseBullets(string $text): array
    {
        $lines = preg_split("/\r\n|\n|\r/", $text);
        $lines = array_map('trim', $lines ?: []);
        $lines = array_filter($lines, fn($x) => $x !== '');
        return array_values($lines);
    }

    private function uploadPublicImage(UploadedFile $file, string $dir): string
    {
        // ensure folder exists
        $path = public_path($dir);
        if (!is_dir($path)) {
            @mkdir($path, 0775, true);
        }

        $name = time() . '_' . Str::random(12) . '.' . $file->getClientOriginalExtension();
        $file->move($path, $name);

        // return relative path
        return $dir . '/' . $name;
    }

    private function deletePublicFile(string $relativePath): void
    {
        $full = public_path($relativePath);
        if (is_file($full)) {
            @unlink($full);
        }
    }
}
