@extends('layouts.admin')

@section('title', __('Settings'))
@section('page_title', __('Settings'))

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">{{ __('Site Settings') }}</h2>
        <p class="text-gray-600">{{ __('Manage site information and contact details') }}</p>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
            <h3 class="text-red-800 font-semibold mb-2">{{ __('Validation Errors') }}:</h3>
            <ul class="text-red-700 space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="flex items-start">
                        <span class="mr-2">•</span>
                        <span>{{ $error }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-600 mr-3"></i>
                <p class="text-green-800">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="settingsForm">
        @csrf

        {{-- General --}}
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">{{ __('General') }}</h3>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label for="site_name" class="block text-sm font-medium text-gray-700">{{ __('Site Name') }} *</label>
                    <input type="text" name="site_name" id="site_name" value="{{ old('site_name', $settings['site_name'] ?? '') }}" required class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('site_name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="site_tagline_id" class="block text-sm font-medium text-gray-700">{{ __('Tagline (ID)') }}</label>
                    <input type="text" name="site_tagline_id" id="site_tagline_id" value="{{ old('site_tagline_id', $settings['site_tagline_id'] ?? '') }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="site_tagline_en" class="block text-sm font-medium text-gray-700">{{ __('Tagline (EN)') }}</label>
                    <input type="text" name="site_tagline_en" id="site_tagline_en" value="{{ old('site_tagline_en', $settings['site_tagline_en'] ?? '') }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="site_description_id" class="block text-sm font-medium text-gray-700">{{ __('Description (ID)') }}</label>
                    <textarea name="site_description_id" id="site_description_id" rows="3" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('site_description_id', $settings['site_description_id'] ?? '') }}</textarea>
                </div>
                <div>
                    <label for="site_description_en" class="block text-sm font-medium text-gray-700">{{ __('Description (EN)') }}</label>
                    <textarea name="site_description_en" id="site_description_en" rows="3" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('site_description_en', $settings['site_description_en'] ?? '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Contact --}}
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">{{ __('Contact') }}</h3>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label for="contact_email" class="block text-sm font-medium text-gray-700">{{ __('Email') }} *</label>
                    <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" required class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('contact_email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="contact_phone" class="block text-sm font-medium text-gray-700">{{ __('Phone') }} *</label>
                    <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" required class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    @error('contact_phone')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="contact_address_id" class="block text-sm font-medium text-gray-700">{{ __('Address (ID)') }}</label>
                    <textarea name="contact_address_id" id="contact_address_id" rows="2" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('contact_address_id', $settings['contact_address_id'] ?? '') }}</textarea>
                </div>
                <div>
                    <label for="contact_address_en" class="block text-sm font-medium text-gray-700">{{ __('Address (EN)') }}</label>
                    <textarea name="contact_address_en" id="contact_address_en" rows="2" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ old('contact_address_en', $settings['contact_address_en'] ?? '') }}</textarea>
                </div>
                <div>
                    <label for="whatsapp_number" class="block text-sm font-medium text-gray-700">{{ __('WhatsApp Number') }}</label>
                    <input type="text" name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number', $settings['whatsapp_number'] ?? '') }}" placeholder="6285177907912" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="whatsapp_message_id" class="block text-sm font-medium text-gray-700">{{ __('WhatsApp Message (ID)') }}</label>
                    <input type="text" name="whatsapp_message_id" id="whatsapp_message_id" value="{{ old('whatsapp_message_id', $settings['whatsapp_message_id'] ?? '') }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="whatsapp_message_en" class="block text-sm font-medium text-gray-700">{{ __('WhatsApp Message (EN)') }}</label>
                    <input type="text" name="whatsapp_message_en" id="whatsapp_message_en" value="{{ old('whatsapp_message_en', $settings['whatsapp_message_en'] ?? '') }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="office_hours_id" class="block text-sm font-medium text-gray-700">{{ __('Office Hours (ID)') }}</label>
                    <input type="text" name="office_hours_id" id="office_hours_id" value="{{ old('office_hours_id', $settings['office_hours_id'] ?? '') }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="office_hours_en" class="block text-sm font-medium text-gray-700">{{ __('Office Hours (EN)') }}</label>
                    <input type="text" name="office_hours_en" id="office_hours_en" value="{{ old('office_hours_en', $settings['office_hours_en'] ?? '') }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
        </div>

        {{-- Social --}}
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">{{ __('Social Media') }}</h3>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="social_facebook" class="block text-sm font-medium text-gray-700">{{ __('Facebook URL') }}</label>
                    <input type="url" name="social_facebook" id="social_facebook" value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="social_instagram" class="block text-sm font-medium text-gray-700">{{ __('Instagram URL') }}</label>
                    <input type="url" name="social_instagram" id="social_instagram" value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="social_twitter" class="block text-sm font-medium text-gray-700">{{ __('Twitter URL') }}</label>
                    <input type="url" name="social_twitter" id="social_twitter" value="{{ old('social_twitter', $settings['social_twitter'] ?? '') }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="social_linkedin" class="block text-sm font-medium text-gray-700">{{ __('LinkedIn URL') }}</label>
                    <input type="url" name="social_linkedin" id="social_linkedin" value="{{ old('social_linkedin', $settings['social_linkedin'] ?? '') }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="social_youtube" class="block text-sm font-medium text-gray-700">{{ __('YouTube URL') }}</label>
                    <input type="url" name="social_youtube" id="social_youtube" value="{{ old('social_youtube', $settings['social_youtube'] ?? '') }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
        </div>

        {{-- SEO & Analytics --}}
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">{{ __('SEO & Analytics') }}</h3>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label for="meta_keywords" class="block text-sm font-medium text-gray-700">{{ __('Meta Keywords') }}</label>
                    <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $settings['meta_keywords'] ?? '') }}" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div>
                    <label for="google_analytics" class="block text-sm font-medium text-gray-700">{{ __('Google Analytics ID') }}</label>
                    <input type="text" name="google_analytics" id="google_analytics" value="{{ old('google_analytics', $settings['google_analytics'] ?? '') }}" placeholder="G-XXXXXXXXXX" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
        </div>

        {{-- Logo & Favicon --}}
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">{{ __('Logo & Favicon') }}</h3>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label for="logo" class="block text-sm font-medium text-gray-700">{{ __('Logo') }}</label>
                    @if(!empty($settings['logo']))
                        <div class="mt-2 mb-3 flex items-center gap-4">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo" class="h-16 w-auto object-contain" onerror="this.src='/images/placeholder.png'">
                            </div>
                            <small class="text-gray-600">{{ explode('/', $settings['logo'])[1] ?? $settings['logo'] }}</small>
                        </div>
                    @else
                        <p class="mt-2 mb-3 text-sm text-gray-500">{{ __('No logo uploaded yet') }}</p>
                    @endif
                    <div class="relative">
                        <input type="file" name="logo" id="logo" accept=".png,.jpg,.jpeg,.svg" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" onchange="previewLogo(this)">
                        <small id="logoPreview" class="mt-1 block text-xs text-gray-500"></small>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">{{ __('PNG, JPG, JPEG, SVG. Max 2MB') }}</p>
                    @error('logo')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="favicon" class="block text-sm font-medium text-gray-700">{{ __('Favicon') }}</label>
                    @if(!empty($settings['favicon']))
                        <div class="mt-2 mb-3 flex items-center gap-4">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('storage/' . $settings['favicon']) }}" alt="Favicon" class="h-8 w-8 object-contain" onerror="this.src='/images/placeholder.png'">
                            </div>
                            <small class="text-gray-600">{{ explode('/', $settings['favicon'])[1] ?? $settings['favicon'] }}</small>
                        </div>
                    @else
                        <p class="mt-2 mb-3 text-sm text-gray-500">{{ __('No favicon uploaded yet') }}</p>
                    @endif
                    <div class="relative">
                        <input type="file" name="favicon" id="favicon" accept=".png,.ico" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" onchange="previewFavicon(this)">
                        <small id="faviconPreview" class="mt-1 block text-xs text-gray-500"></small>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">{{ __('PNG, ICO. Max 1MB') }}</p>
                    @error('favicon')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <button type="reset" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition-colors">
                <i class="fas fa-undo mr-2"></i>{{ __('Reset') }}
            </button>
            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors" id="submitBtn">
                <i class="fas fa-save mr-2"></i>{{ __('Save Settings') }}
            </button>
        </div>
    </form>
</div>

<script>
function previewLogo(input) {
    const preview = document.getElementById('logoPreview');
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const size = (file.size / 1024).toFixed(2);
        preview.textContent = `✓ ${file.name} (${size} KB)`;
    }
}

function previewFavicon(input) {
    const preview = document.getElementById('faviconPreview');
    if (input.files && input.files[0]) {
        const file = input.files[0];
        const size = (file.size / 1024).toFixed(2);
        preview.textContent = `✓ ${file.name} (${size} KB)`;
    }
}

document.getElementById('settingsForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>{{ __("Saving...") }}';
});
</script>
@endsection
