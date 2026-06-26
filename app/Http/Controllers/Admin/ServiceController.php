<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    /**
     * Display a listing of services
     */
    public function index(): View
    {
        $services = Service::latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service
     */
    public function create(): View
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created service
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name_id' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'short_description_id' => 'required|string|max:500',
            'short_description_en' => 'nullable|string|max:500',
            'description_id' => 'required|string',
            'description_en' => 'nullable|string',
            'icon' => 'nullable|image|mimes:png,svg|max:1024',
            'features_id' => 'nullable|array',
            'features_id.*' => 'string|max:255',
            'features_en' => 'nullable|array',
            'features_en.*' => 'string|max:255',
            'process_steps_id' => 'nullable|array',
            'process_steps_id.*' => 'string|max:255',
            'process_steps_en' => 'nullable|array',
            'process_steps_en.*' => 'string|max:255',
            'starting_price' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        // Handle icon upload
        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')
                ->store('services/icons', 'public');
        }

        // Generate slug
        $validated['slug'] = Str::slug($validated['name_id']);

        // Process features as JSON
        $validated['features_id'] = $request->input('features_id', []);
        $validated['features_en'] = $request->input('features_en', []);

        // Process process steps as JSON
        $validated['process_steps_id'] = $request->input('process_steps_id', []);
        $validated['process_steps_en'] = $request->input('process_steps_en', []);

        $validated['is_active'] = $request->boolean('is_active');

        Service::create($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Show the form for editing a service
     */
    public function edit($id): View
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified service
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'name_id' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'short_description_id' => 'required|string|max:500',
            'short_description_en' => 'nullable|string|max:500',
            'description_id' => 'required|string',
            'description_en' => 'nullable|string',
            'icon' => 'nullable|image|mimes:png,svg|max:1024',
            'features_id' => 'nullable|array',
            'features_id.*' => 'string|max:255',
            'features_en' => 'nullable|array',
            'features_en.*' => 'string|max:255',
            'process_steps_id' => 'nullable|array',
            'process_steps_id.*' => 'string|max:255',
            'process_steps_en' => 'nullable|array',
            'process_steps_en.*' => 'string|max:255',
            'starting_price' => 'nullable|numeric|min:0',
            'is_active' => 'boolean',
        ]);

        // Handle icon upload
        if ($request->hasFile('icon')) {
            if ($service->icon) {
                Storage::disk('public')->delete($service->icon);
            }
            $validated['icon'] = $request->file('icon')
                ->store('services/icons', 'public');
        }

        // Process features as JSON
        $validated['features_id'] = $request->input('features_id', []);
        $validated['features_en'] = $request->input('features_en', []);

        // Process process steps as JSON
        $validated['process_steps_id'] = $request->input('process_steps_id', []);
        $validated['process_steps_en'] = $request->input('process_steps_en', []);

        $validated['is_active'] = $request->boolean('is_active');

        $service->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified service
     */
    public function destroy($id): RedirectResponse
    {
        $service = Service::findOrFail($id);

        // Delete icon
        if ($service->icon) {
            Storage::disk('public')->delete($service->icon);
        }

        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
