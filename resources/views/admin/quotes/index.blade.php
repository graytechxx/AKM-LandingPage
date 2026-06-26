@extends('layouts.admin')

@section('title', __('Quote Requests'))
@section('page_title', __('Quote Requests'))

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ __('Quote Requests') }}</h2>
            <p class="text-gray-600">{{ __('Manage project quote requests from clients') }}</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.quotes.export') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                <i class="fas fa-file-excel mr-2"></i>
                {{ __('Export') }}
            </a>
        </div>
    </div>

    {{-- Status Filter Tabs --}}
    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.quotes.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium {{ !request('status') ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors">
                {{ __('All') }}
                <span class="ml-2 px-2 py-0.5 text-xs rounded-full {{ !request('status') ? 'bg-white text-indigo-600' : 'bg-gray-300 text-gray-700' }}">
                    {{ $counts['all'] ?? 0 }}
                </span>
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'pending']) }}" class="px-4 py-2 rounded-lg text-sm font-medium {{ request('status') == 'pending' ? 'bg-yellow-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors">
                {{ __('Pending') }}
                <span class="ml-2 px-2 py-0.5 text-xs rounded-full {{ request('status') == 'pending' ? 'bg-white text-yellow-600' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ $counts['pending'] ?? 0 }}
                </span>
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'in_review']) }}" class="px-4 py-2 rounded-lg text-sm font-medium {{ request('status') == 'in_review' ? 'bg-blue-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors">
                {{ __('In Review') }}
                <span class="ml-2 px-2 py-0.5 text-xs rounded-full {{ request('status') == 'in_review' ? 'bg-white text-blue-600' : 'bg-blue-100 text-blue-700' }}">
                    {{ $counts['in_review'] ?? 0 }}
                </span>
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'quoted']) }}" class="px-4 py-2 rounded-lg text-sm font-medium {{ request('status') == 'quoted' ? 'bg-purple-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors">
                {{ __('Quoted') }}
                <span class="ml-2 px-2 py-0.5 text-xs rounded-full {{ request('status') == 'quoted' ? 'bg-white text-purple-600' : 'bg-purple-100 text-purple-700' }}">
                    {{ $counts['quoted'] ?? 0 }}
                </span>
            </a>
            <a href="{{ route('admin.quotes.index', ['status' => 'accepted']) }}" class="px-4 py-2 rounded-lg text-sm font-medium {{ request('status') == 'accepted' ? 'bg-green-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors">
                {{ __('Accepted') }}
                <span class="ml-2 px-2 py-0.5 text-xs rounded-full {{ request('status') == 'accepted' ? 'bg-white text-green-600' : 'bg-green-100 text-green-700' }}">
                    {{ $counts['accepted'] ?? 0 }}
                </span>
            </a>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('ID') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Name') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Project Type') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Location') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Budget') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Date') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Status') }}</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($quotes ?? [] as $quote)
                    <tr class="hover:bg-gray-50 {{ $quote->status == 'pending' ? 'bg-yellow-50' : '' }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            #{{ $quote->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $quote->name }}</div>
                            <div class="text-sm text-gray-500">{{ $quote->email }}</div>
                            <div class="text-xs text-gray-400">{{ $quote->phone }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ $quote->project_type_label }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ $quote->location }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ $quote->budget_range_label }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $quote->created_at->format('d M Y') }}
                            <div class="text-xs text-gray-400">{{ $quote->timeline_label }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'in_review' => 'bg-blue-100 text-blue-800',
                                    'quoted' => 'bg-purple-100 text-purple-800',
                                    'accepted' => 'bg-green-100 text-green-800',
                                    'rejected' => 'bg-red-100 text-red-800',
                                ];
                                $statusColor = $statusColors[$quote->status] ?? 'bg-gray-100 text-gray-800';
                            @endphp
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                {{ $quote->status_label }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.quotes.show', $quote) }}" class="text-indigo-600 hover:text-indigo-900" title="{{ __('View Details') }}">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                            <i class="fas fa-inbox text-4xl mb-4 text-gray-300"></i>
                            <p>{{ __('No quote requests found') }}</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if(isset($quotes) && $quotes->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $quotes->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
