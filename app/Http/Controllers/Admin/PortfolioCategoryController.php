<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioCategoryController extends Controller
{
    public function index()
    {
        $items = PortfolioCategory::orderBy('sort_order')->orderBy('id','desc')->paginate(20);
        return view('admin.portfolio_categories.index', compact('items'));
    }

    public function create()
    {
        return view('admin.portfolio_categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable'],
        ]);

        $data['slug'] = Str::slug($data['name']);
        // ensure unique slug
        $base = $data['slug']; $i = 1;
        while (PortfolioCategory::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $base.'-'.$i++;
        }

        $data['is_active'] = $request->boolean('is_active');

        PortfolioCategory::create($data);

        return redirect()->route('admin.portfolio-categories.index')->with('success','Category created');
    }

    public function edit(PortfolioCategory $portfolio_category)
    {
        return view('admin.portfolio_categories.edit', ['item' => $portfolio_category]);
    }

    public function update(Request $request, PortfolioCategory $portfolio_category)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable'],
        ]);

        $slug = Str::slug($data['name']);
        $base = $slug; $i = 1;
        while (PortfolioCategory::where('slug', $slug)->where('id','!=',$portfolio_category->id)->exists()) {
            $slug = $base.'-'.$i++;
        }

        $portfolio_category->update([
            'name' => $data['name'],
            'slug' => $slug,
            'sort_order' => $data['sort_order'] ?? null,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.portfolio-categories.index')->with('success','Category updated');
    }

    public function destroy(PortfolioCategory $portfolio_category)
    {
        $portfolio_category->delete();
        return back()->with('success','Category deleted');
    }
}
