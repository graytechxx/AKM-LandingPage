<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class PricingController extends Controller
{
    /**
     * Display a listing of pricing packages
     */
    public function index(): View
    {
        $packages = PricingPackage::latest()->paginate(10);
        return view('admin.pricing.index', compact('packages'));
    }

    /**
     * Show the form for creating a new pricing package
     */
    public function create(): View
    {
        return view('admin.pricing.create');
    }

    /**
     * Store a newly created pricing package
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name_id' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'description_id' => 'nullable|string',
            'description_en' => 'nullable|string',
            'features_id' => 'nullable|array',
            'features_id.*' => 'string|max:255',
            'features_en' => 'nullable|array',
            'features_en.*' => 'string|max:255',
            'is_popular' => 'boolean',
            'is_active' => 'boolean',
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['name_id']);

        // Process features as JSON
        $validated['features_id'] = $request->input('features_id', []);
        $validated['features_en'] = $request->input('features_en', []);

        $validated['is_popular'] = $request->boolean('is_popular');
        $validated['is_active'] = $request->boolean('is_active');

        // If this package is marked as popular, unmark others
        if ($validated['is_popular']) {
            PricingPackage::where('is_popular', true)->update(['is_popular' => false]);
        }

        PricingPackage::create($validated);

        return redirect()
            ->route('admin.pricing.index')
            ->with('success', 'Pricing package created successfully.');
    }

    /**
     * Show the form for editing a pricing package
     */
    public function edit($id): View
    {
        $package = PricingPackage::findOrFail($id);
        return view('admin.pricing.edit', compact('package'));
    }

    /**
     * Update the specified pricing package
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $package = PricingPackage::findOrFail($id);

        $validated = $request->validate([
            'name_id' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'description_id' => 'nullable|string',
            'description_en' => 'nullable|string',
            'features_id' => 'nullable|array',
            'features_id.*' => 'string|max:255',
            'features_en' => 'nullable|array',
            'features_en.*' => 'string|max:255',
            'is_popular' => 'boolean',
            'is_active' => 'boolean',
        ]);

        // Process features as JSON
        $validated['features_id'] = $request->input('features_id', []);
        $validated['features_en'] = $request->input('features_en', []);

        $validated['is_popular'] = $request->boolean('is_popular');
        $validated['is_active'] = $request->boolean('is_active');

        // If this package is marked as popular, unmark others
        if ($validated['is_popular'] && !$package->is_popular) {
            PricingPackage::where('is_popular', true)->update(['is_popular' => false]);
        }

        $package->update($validated);

        return redirect()
            ->route('admin.pricing.index')
            ->with('success', 'Pricing package updated successfully.');
    }

    /**
     * Remove the specified pricing package
     */
    public function destroy($id): RedirectResponse
    {
        $package = PricingPackage::findOrFail($id);
        $package->delete();

        return redirect()
            ->route('admin.pricing.index')
            ->with('success', 'Pricing package deleted successfully.');
    }
}
