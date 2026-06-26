<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display site settings
     */
    public function index(): View
    {
        $settings = [
            'site_name' => Setting::get('site_name', 'AKM Interior Design'),
            'site_tagline_id' => Setting::get('site_tagline_id', ''),
            'site_tagline_en' => Setting::get('site_tagline_en', ''),
            'site_description_id' => Setting::get('site_description_id', ''),
            'site_description_en' => Setting::get('site_description_en', ''),
            'contact_email' => Setting::get('contact_email', ''),
            'contact_phone' => Setting::get('contact_phone', ''),
            'contact_address_id' => Setting::get('contact_address_id', ''),
            'contact_address_en' => Setting::get('contact_address_en', ''),
            'whatsapp_number' => Setting::get('whatsapp_number', ''),
            'whatsapp_message_id' => Setting::get('whatsapp_message_id', 'Halo, saya tertarik dengan layanan AKM Interior Design'),
            'whatsapp_message_en' => Setting::get('whatsapp_message_en', 'Hello, I am interested in AKM Interior Design services'),
            'office_hours_id' => Setting::get('office_hours_id', ''),
            'office_hours_en' => Setting::get('office_hours_en', ''),
            'social_facebook' => Setting::get('social_facebook', ''),
            'social_instagram' => Setting::get('social_instagram', ''),
            'social_twitter' => Setting::get('social_twitter', ''),
            'social_linkedin' => Setting::get('social_linkedin', ''),
            'social_youtube' => Setting::get('social_youtube', ''),
            'meta_keywords' => Setting::get('meta_keywords', ''),
            'google_analytics' => Setting::get('google_analytics', ''),
            'logo' => Setting::get('logo', ''),
            'favicon' => Setting::get('favicon', ''),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update site settings
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_tagline_id' => 'nullable|string|max:255',
            'site_tagline_en' => 'nullable|string|max:255',
            'site_description_id' => 'nullable|string',
            'site_description_en' => 'nullable|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'required|string|max:50',
            'contact_address_id' => 'nullable|string',
            'contact_address_en' => 'nullable|string',
            'whatsapp_number' => 'nullable|string|max:20',
            'whatsapp_message_id' => 'nullable|string|max:255',
            'whatsapp_message_en' => 'nullable|string|max:255',
            'office_hours_id' => 'nullable|string|max:255',
            'office_hours_en' => 'nullable|string|max:255',
            'social_facebook' => 'nullable|url|max:255',
            'social_instagram' => 'nullable|url|max:255',
            'social_twitter' => 'nullable|url|max:255',
            'social_linkedin' => 'nullable|url|max:255',
            'social_youtube' => 'nullable|url|max:255',
            'meta_keywords' => 'nullable|string',
            'google_analytics' => 'nullable|string',
            'logo' => 'nullable|mimes:png,jpg,jpeg,svg|max:2048',
            'favicon' => 'nullable|mimes:png,ico|max:1024',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $oldLogo = Setting::get('logo');
            if ($oldLogo) {
                Storage::disk('public')->delete($oldLogo);
            }
            $validated['logo'] = $request->file('logo')
                ->store('settings', 'public');
        } else {
            unset($validated['logo']);
        }

        // Handle favicon upload
        if ($request->hasFile('favicon') && $request->file('favicon')->isValid()) {
            $oldFavicon = Setting::get('favicon');
            if ($oldFavicon) {
                Storage::disk('public')->delete($oldFavicon);
            }
            $validated['favicon'] = $request->file('favicon')
                ->store('settings', 'public');
        } else {
            unset($validated['favicon']);
        }

        // Save all settings
        foreach ($validated as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}
