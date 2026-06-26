<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials
     */
    public function index(): View
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new testimonial
     */
    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created testimonial
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
            'project_name' => 'nullable|string|max:255',
            'content_id' => 'required|string',
            'content_en' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_active' => 'boolean',
        ]);

        // Handle client photo upload
        if ($request->hasFile('client_photo')) {
            $validated['client_photo'] = $request->file('client_photo')
                ->store('testimonials/photos', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');

        Testimonial::create($validated);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    /**
     * Show the form for editing a testimonial
     */
    public function edit($id): View
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified testimonial
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $testimonial = Testimonial::findOrFail($id);

        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1024',
            'project_name' => 'nullable|string|max:255',
            'content_id' => 'required|string',
            'content_en' => 'nullable|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_active' => 'boolean',
        ]);

        // Handle client photo upload
        if ($request->hasFile('client_photo')) {
            if ($testimonial->client_photo) {
                Storage::disk('public')->delete($testimonial->client_photo);
            }
            $validated['client_photo'] = $request->file('client_photo')
                ->store('testimonials/photos', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');

        $testimonial->update($validated);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified testimonial
     */
    public function destroy($id): RedirectResponse
    {
        $testimonial = Testimonial::findOrFail($id);

        // Delete client photo
        if ($testimonial->client_photo) {
            Storage::disk('public')->delete($testimonial->client_photo);
        }

        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
