@extends('layouts.admin')

@section('title', __('Portfolios'))
@section('page_title', __('Portfolios'))

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ __('Portfolios') }}</h2>
            <p class="text-gray-600">{{ __('Manage your portfolio projects') }}</p>
        </div>
        <a href="{{ route('admin.portfolios.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>
            {{ __('Add New Portfolio') }}
        </a>
    </div>

    {{-- Filters --}}
    <div class="bg-white rounded-lg shadow-sm p-4">
        <form method="GET" action="{{ route('admin.portfolios.index') }}" class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('Search portfolios...') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="flex gap-4">
                <select name="category" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">{{ __('All Categories') }}</option>
                    <option value="living_room" {{ request('category') == 'living_room' ? 'selected' : '' }}>{{ __('Living Room') }}</option>
                    <option value="bedroom" {{ request('category') == 'bedroom' ? 'selected' : '' }}>{{ __('Bedroom') }}</option>
                    <option value="kitchen" {{ request('category') == 'kitchen' ? 'selected' : '' }}>{{ __('Kitchen') }}</option>
                    <option value="office" {{ request('category') == 'office' ? 'selected' : '' }}>{{ __('Office') }}</option>
                    <option value="commercial" {{ request('category') == 'commercial' ? 'selected' : '' }}>{{ __('Commercial') }}</option>
                </select>
                <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">{{ __('All Status') }}</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>{{ __('Published') }}</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>{{ __('Draft') }}</option>
                </select>
                <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                    <i class="fas fa-filter mr-2"></i>{{ __('Filter') }}
                </button>
            </div>
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Image') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Title') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Category') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Featured') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Status') }}</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($portfolios ?? [] as $portfolio)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($portfolio->featured_image)
                                <img src="{{ asset('storage/' . $portfolio->featured_image) }}" alt="{{ $portfolio->title_id }}" class="h-16 w-16 object-cover rounded-lg">
                            @else
                                <div class="h-16 w-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $portfolio->title_id }}</div>
                            <div class="text-sm text-gray-500">{{ $portfolio->title_en }}</div>
                            <div class="text-xs text-gray-400 mt-1">{{ $portfolio->location }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $categoryLabels = [
                                    'living_room' => __('Living Room'),
                                    'bedroom' => __('Bedroom'),
                                    'kitchen' => __('Kitchen'),
                                    'office' => __('Office'),
                                    'commercial' => __('Commercial'),
                                ];
                            @endphp
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                {{ $categoryLabels[$portfolio->category] ?? $portfolio->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($portfolio->is_featured)
                                <span class="text-yellow-500"><i class="fas fa-star"></i></span>
                            @else
                                <span class="text-gray-300"><i class="far fa-star"></i></span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($portfolio->status == 'published')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ __('Published') }}
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    {{ __('Draft') }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="text-indigo-600 hover:text-indigo-900" title="{{ __('Edit') }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" class="inline" onsubmit="return confirm('{{ addslashes(__('Are you sure you want to delete this portfolio?')) }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" title="{{ __('Delete') }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            <i class="fas fa-inbox text-4xl mb-4 text-gray-300"></i>
                            <p>{{ __('No portfolios found') }}</p>
                            @if(request()->hasAny(['search', 'category', 'status']))
                                <a href="{{ route('admin.portfolios.index') }}" class="text-indigo-600 hover:text-indigo-800 mt-2 inline-block">
                                    {{ __('Clear filters') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if(isset($portfolios) && $portfolios->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $portfolios->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
