@extends('layouts.admin')

@section('title', __('Add Portfolio'))
@section('page_title', __('Add New Portfolio'))

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.portfolios.index') }}" class="text-indigo-600 hover:text-indigo-800">
            <i class="fas fa-arrow-left mr-2"></i>{{ __('Back to Portfolios') }}
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">{{ __('Portfolio Information') }}</h2>
        </div>

        <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            {{-- Title --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title_id" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Title (Indonesian)') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title_id" id="title_id" value="{{ old('title_id') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('title_id') border-red-500 @enderror">
                    @error('title_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="title_en" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Title (English)') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="title_en" id="title_en" value="{{ old('title_en') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('title_en') border-red-500 @enderror">
                    @error('title_en')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Slug --}}
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Slug') }}</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('slug') border-red-500 @enderror" placeholder="{{ __('Auto-generated if left empty') }}">
                @error('slug')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="description_id" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Description (Indonesian)') }}</label>
                    <textarea name="description_id" id="description_id" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('description_id') border-red-500 @enderror">{{ old('description_id') }}</textarea>
                    @error('description_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="description_en" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Description (English)') }}</label>
                    <textarea name="description_en" id="description_en" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('description_en') border-red-500 @enderror">{{ old('description_en') }}</textarea>
                    @error('description_en')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Category & Details --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Category') }} <span class="text-red-500">*</span></label>
                    <select name="category" id="category" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('category') border-red-500 @enderror">
                        <option value="living_room" {{ old('category') == 'living_room' ? 'selected' : '' }}>{{ __('Living Room') }}</option>
                        <option value="bedroom" {{ old('category') == 'bedroom' ? 'selected' : '' }}>{{ __('Bedroom') }}</option>
                        <option value="kitchen" {{ old('category') == 'kitchen' ? 'selected' : '' }}>{{ __('Kitchen') }}</option>
                        <option value="office" {{ old('category') == 'office' ? 'selected' : '' }}>{{ __('Office') }}</option>
                        <option value="commercial" {{ old('category') == 'commercial' ? 'selected' : '' }}>{{ __('Commercial') }}</option>
                    </select>
                    @error('category')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="client" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Client') }}</label>
                    <input type="text" name="client" id="client" value="{{ old('client') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('client') border-red-500 @enderror">
                    @error('client')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Location') }}</label>
                    <input type="text" name="location" id="location" value="{{ old('location') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('location') border-red-500 @enderror">
                    @error('location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Area, Duration, Budget --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="area_sqm" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Area (m²)') }}</label>
                    <input type="number" name="area_sqm" id="area_sqm" value="{{ old('area_sqm') }}" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('area_sqm') border-red-500 @enderror">
                    @error('area_sqm')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Duration') }}</label>
                    <input type="text" name="duration" id="duration" value="{{ old('duration') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('duration') border-red-500 @enderror" placeholder="{{ __('e.g., 3 weeks') }}">
                    @error('duration')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="budget_range" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Budget Range') }}</label>
                    <input type="text" name="budget_range" id="budget_range" value="{{ old('budget_range') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('budget_range') border-red-500 @enderror" placeholder="{{ __('e.g., Rp 50-80 Juta') }}">
                    @error('budget_range')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Featured Image --}}
            <div>
                <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Featured Image') }}</label>
                <input type="file" name="featured_image" id="featured_image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('featured_image') border-red-500 @enderror">
                @error('featured_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Gallery Images --}}
            <div>
                <label for="gallery_images" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Gallery Images') }}</label>
                <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('gallery_images') border-red-500 @enderror">
                <p class="mt-1 text-xs text-gray-500">{{ __('You can select multiple images') }}</p>
                @error('gallery_images')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Options --}}
            <div class="flex flex-col sm:flex-row gap-6">
                <div class="flex items-center">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="is_featured" class="ml-2 block text-sm text-gray-700">
                        {{ __('Featured Portfolio') }}
                    </label>
                </div>
                <div class="flex items-center">
                    <label for="status" class="mr-2 block text-sm text-gray-700">{{ __('Status') }}:</label>
                    <select name="status" id="status" class="px-3 py-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>{{ __('Draft') }}</option>
                        <option value="published" {{ old('status', 'published') == 'published' ? 'selected' : '' }}>{{ __('Published') }}</option>
                    </select>
                </div>
            </div>

            {{-- Submit Buttons --}}
            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.portfolios.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    {{ __('Cancel') }}
                </a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    {{ __('Create Portfolio') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Auto-generate slug from Indonesian title
    document.getElementById('title_id').addEventListener('blur', function() {
        const slugField = document.getElementById('slug');
        if (!slugField.value) {
            const title = this.value.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim('-');
            slugField.value = title;
        }
    });
</script>
@endsection
