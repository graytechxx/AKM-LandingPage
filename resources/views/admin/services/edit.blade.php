@extends('layouts.admin')

@section('title', __('admin.Edit Service'))
@section('page_title', __('admin.Edit Service'))

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.services.index') }}" class="text-indigo-600 hover:text-indigo-800">
            <i class="fas fa-arrow-left mr-2"></i>{{ __('admin.Back to Services') }}
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">{{ __('admin.Edit Service') }}</h2>
        </div>

        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            {{-- Name --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name_id" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Title (Indonesian)') }} <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name_id" id="name_id" value="{{ old('name_id', $service->name_id) }}" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('name_id') border-red-500 @enderror">
                    @error('name_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="name_en" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Title (English)') }}
                    </label>
                    <input type="text" name="name_en" id="name_en" value="{{ old('name_en', $service->name_en) }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('name_en') border-red-500 @enderror">
                    @error('name_en')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Short Description --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="short_description_id" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Short description (Indonesian)') }} <span class="text-red-500">*</span>
                    </label>
                    <textarea name="short_description_id" id="short_description_id" rows="3" maxlength="500" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('short_description_id') border-red-500 @enderror">{{ old('short_description_id', $service->short_description_id) }}</textarea>
                    @error('short_description_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="short_description_en" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Short description (English)') }}
                    </label>
                    <textarea name="short_description_en" id="short_description_en" rows="3" maxlength="500" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('short_description_en') border-red-500 @enderror">{{ old('short_description_en', $service->short_description_en) }}</textarea>
                    @error('short_description_en')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Description --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="description_id" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Description (Indonesian)') }} <span class="text-red-500">*</span>
                    </label>
                    <textarea name="description_id" id="description_id" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('description_id') border-red-500 @enderror">{{ old('description_id', $service->description_id) }}</textarea>
                    @error('description_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="description_en" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Description (English)') }}
                    </label>
                    <textarea name="description_en" id="description_en" rows="6" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('description_en') border-red-500 @enderror">{{ old('description_en', $service->description_en) }}</textarea>
                    @error('description_en')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Icon --}}
            <div>
                <label for="icon" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Icon') }} (PNG/SVG, max 1MB)</label>
                @if($service->icon)
                    <div class="mb-2 flex items-center gap-4">
                        <img src="{{ asset('storage/' . $service->icon) }}" alt="" class="h-12 w-12 object-contain border rounded">
                        <span class="text-sm text-gray-500">{{ __('admin.Current icon') }}</span>
                    </div>
                @endif
                <input type="file" name="icon" id="icon" accept=".png,.svg" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('icon') border-red-500 @enderror">
                <p class="mt-1 text-xs text-gray-500">{{ __('admin.Leave empty to keep current icon') }}</p>
                @error('icon')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Starting Price --}}
            <div>
                <label for="starting_price" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Starting price') }}</label>
                <input type="number" name="starting_price" id="starting_price" value="{{ old('starting_price', $service->starting_price) }}" step="0.01" min="0" class="w-full md:w-48 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('starting_price') border-red-500 @enderror">
                @error('starting_price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Features & Process Steps --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="features_id" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Features (Indonesian)') }} — {{ __('admin.One item per line') }}</label>
                    <textarea name="features_id" id="features_id" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('features_id') border-red-500 @enderror" placeholder="{{ __('admin.One item per line') }}">{{ old('features_id', is_array(old('features_id')) ? implode("\n", old('features_id')) : implode("\n", $service->features_id ?? [])) }}</textarea>
                    @error('features_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="features_en" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Features (English)') }} — {{ __('admin.One item per line') }}</label>
                    <textarea name="features_en" id="features_en" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('features_en') border-red-500 @enderror" placeholder="{{ __('admin.One item per line') }}">{{ old('features_en', is_array(old('features_en')) ? implode("\n", old('features_en')) : implode("\n", $service->features_en ?? [])) }}</textarea>
                    @error('features_en')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="process_steps_id" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Process steps (Indonesian)') }} — {{ __('admin.One item per line') }}</label>
                    <textarea name="process_steps_id" id="process_steps_id" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('process_steps_id') border-red-500 @enderror" placeholder="{{ __('admin.One item per line') }}">{{ old('process_steps_id', is_array(old('process_steps_id')) ? implode("\n", old('process_steps_id')) : implode("\n", $service->process_steps_id ?? [])) }}</textarea>
                    @error('process_steps_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="process_steps_en" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Process steps (English)') }} — {{ __('admin.One item per line') }}</label>
                    <textarea name="process_steps_en" id="process_steps_en" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('process_steps_en') border-red-500 @enderror" placeholder="{{ __('admin.One item per line') }}">{{ old('process_steps_en', is_array(old('process_steps_en')) ? implode("\n", old('process_steps_en')) : implode("\n", $service->process_steps_en ?? [])) }}</textarea>
                    @error('process_steps_en')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Is Active --}}
            <div class="flex items-center">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="is_active" class="ml-2 block text-sm text-gray-700">{{ __('admin.Active') }} ({{ __('admin.Show on website') }})</label>
            </div>

            {{-- Submit --}}
            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.services.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    {{ __('Cancel') }}
                </a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    {{ __('admin.Update Service') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function() {
            ['features_id', 'features_en', 'process_steps_id', 'process_steps_en'].forEach(function(id) {
                var el = document.getElementById(id);
                if (el && el.value.trim()) {
                    var lines = el.value.split('\n').map(function(s) { return s.trim(); }).filter(Boolean);
                    el.removeAttribute('name');
                    lines.forEach(function(line, i) {
                        var input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = id + '[' + i + ']';
                        input.value = line;
                        form.appendChild(input);
                    });
                }
            });
        });
    }
});
</script>
@endsection
