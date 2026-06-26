<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of portfolios
     */
    public function index(): View
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new portfolio
     */
    public function create(): View
    {
        return view('admin.portfolios.create');
    }

    /**
     * Store a newly created portfolio
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title_id' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_id' => 'required|string',
            'description_en' => 'nullable|string',
            'category' => 'required|string|in:living_room,bedroom,kitchen,office,commercial',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'area_sqm' => 'nullable|numeric|min:0',
            'duration' => 'nullable|string|max:100',
            'budget_range' => 'nullable|string|max:100',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_featured' => 'boolean',
            'status' => 'required|in:published,draft',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                ->store('portfolios/featured', 'public');
        }

        // Handle gallery images upload
        $galleryImages = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('portfolios/gallery', 'public');
            }
        }
        $validated['gallery_images'] = $galleryImages;

        // Generate slug
        $validated['slug'] = Str::slug($validated['title_id']);

        $validated['is_featured'] = $request->boolean('is_featured');

        Portfolio::create($validated);

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portfolio created successfully.');
    }

    /**
     * Show the form for editing a portfolio
     */
    public function edit(Portfolio $portfolio): View
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified portfolio
     */
    public function update(Request $request, Portfolio $portfolio): RedirectResponse
    {

        $validated = $request->validate([
            'title_id' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_id' => 'required|string',
            'description_en' => 'nullable|string',
            'category' => 'required|string|in:living_room,bedroom,kitchen,office,commercial',
            'client' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'area_sqm' => 'nullable|numeric|min:0',
            'duration' => 'nullable|string|max:100',
            'budget_range' => 'nullable|string|max:100',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_featured' => 'boolean',
            'status' => 'required|in:published,draft',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            if ($portfolio->featured_image) {
                Storage::disk('public')->delete($portfolio->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')
                ->store('portfolios/featured', 'public');
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            $galleryImages = $portfolio->gallery_images ?? [];
            foreach ($request->file('gallery_images') as $image) {
                $galleryImages[] = $image->store('portfolios/gallery', 'public');
            }
            $validated['gallery_images'] = $galleryImages;
        }

        $validated['is_featured'] = $request->boolean('is_featured');

        $portfolio->update($validated);

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portfolio updated successfully.');
    }

    /**
     * Remove the specified portfolio
     */
    public function destroy(Portfolio $portfolio): RedirectResponse
    {

        // Delete featured image
        if ($portfolio->featured_image) {
            Storage::disk('public')->delete($portfolio->featured_image);
        }

        // Delete gallery images
        if ($portfolio->gallery_images) {
            foreach ($portfolio->gallery_images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $portfolio->delete();

        return redirect()
            ->route('admin.portfolios.index')
            ->with('success', 'Portfolio deleted successfully.');
    }

    /**
     * Toggle featured status
     */
    public function toggleFeatured(Portfolio $portfolio): RedirectResponse
    {
        $portfolio->update(['is_featured' => !$portfolio->is_featured]);

        $status = $portfolio->is_featured ? 'featured' : 'unfeatured';

        return redirect()
            ->back()
            ->with('success', "Portfolio marked as {$status} successfully.");
    }
}
