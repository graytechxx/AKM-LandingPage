@extends('layouts.admin')

@section('title', __('admin.Edit Testimonial'))
@section('page_title', __('admin.Edit Testimonial'))

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.testimonials.index') }}" class="text-indigo-600 hover:text-indigo-800">
            <i class="fas fa-arrow-left mr-2"></i>{{ __('admin.Back to Testimonials') }}
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">{{ __('admin.Edit Testimonial') }}</h2>
        </div>

        <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            {{-- Client name & Project name --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="client_name" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('admin.Client name') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $testimonial->client_name) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('client_name') border-red-500 @enderror">
                    @error('client_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="project_name" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('admin.Project name') }}
                    </label>
                    <input type="text" name="project_name" id="project_name" value="{{ old('project_name', $testimonial->project_name) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('project_name') border-red-500 @enderror">
                    @error('project_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Client photo --}}
            <div>
                <label for="client_photo" class="block text-sm font-medium text-gray-700 mb-2">{{ __('admin.Client photo') }} (JPEG/PNG/WebP, max 1MB)</label>
                @if($testimonial->client_photo)
                    <div class="mb-2 flex items-center gap-4">
                        <img src="{{ asset('storage/' . $testimonial->client_photo) }}" alt="{{ $testimonial->client_name }}" class="h-16 w-16 rounded-full object-cover border">
                        <span class="text-sm text-gray-500">{{ __('admin.Current photo') }}</span>
                    </div>
                @endif
                <input type="file" name="client_photo" id="client_photo" accept=".jpeg,.jpg,.png,.webp" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('client_photo') border-red-500 @enderror">
                <p class="mt-1 text-xs text-gray-500">{{ __('admin.Leave empty to keep current photo') }}</p>
                @error('client_photo')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Content --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="content_id" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('admin.Content') }} ({{ __('admin.Indonesian') }}) <span class="text-red-500">*</span>
                    </label>
                    <textarea name="content_id" id="content_id" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('content_id') border-red-500 @enderror">{{ old('content_id', $testimonial->content_id) }}</textarea>
                    @error('content_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="content_en" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('admin.Content') }} ({{ __('admin.English') }})
                    </label>
                    <textarea name="content_en" id="content_en" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('content_en') border-red-500 @enderror">{{ old('content_en', $testimonial->content_en) }}</textarea>
                    @error('content_en')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Rating --}}
            <div>
                <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">
                    {{ __('admin.Rating') }} (1–5) <span class="text-red-500">*</span>
                </label>
                <select name="rating" id="rating" required class="w-full md:w-32 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('rating') border-red-500 @enderror">
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>{{ $i }} {{ $i === 1 ? __('admin.star') : __('admin.stars') }}</option>
                    @endfor
                </select>
                @error('rating')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Is Active --}}
            <div class="flex items-center">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="is_active" class="ml-2 block text-sm text-gray-700">{{ __('admin.Active') }} ({{ __('admin.Show on website') }})</label>
            </div>

            {{-- Submit --}}
            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    {{ __('Cancel') }}
                </a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    {{ __('admin.Update Testimonial') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
