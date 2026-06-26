@extends('layouts.admin')

@section('title', __('admin.Dashboard'))
@section('page_title', __('admin.Dashboard'))

@section('content')
<div class="space-y-6">
    {{-- Statistics Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        {{-- Portfolios Card --}}
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-indigo-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">{{ __('admin.Total Portfolios') }}</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $portfolioCount ?? 0 }}</p>
                </div>
                <div class="p-3 bg-indigo-100 rounded-full">
                    <i class="fas fa-images text-indigo-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-600 font-medium">{{ $publishedPortfolios ?? 0 }}</span>
                <span class="text-gray-500 ml-2">{{ __('admin.published') }}</span>
            </div>
        </div>

        {{-- Pending Quotes Card --}}
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">{{ __('admin.Pending Quotes') }}</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $pendingQuotes ?? 0 }}</p>
                </div>
                <div class="p-3 bg-yellow-100 rounded-full">
                    <i class="fas fa-file-invoice-dollar text-yellow-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-yellow-600 font-medium">{{ $totalQuotes ?? 0 }}</span>
                <span class="text-gray-500 ml-2">{{ __('total requests') }}</span>
            </div>
        </div>

        {{-- Unread Messages Card --}}
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">{{ __('Unread Messages') }}</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $unreadMessages ?? 0 }}</p>
                </div>
                <div class="p-3 bg-red-100 rounded-full">
                    <i class="fas fa-envelope text-red-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-gray-600 font-medium">{{ $totalMessages ?? 0 }}</span>
                <span class="text-gray-500 ml-2">{{ __('admin.total messages') }}</span>
            </div>
        </div>

        {{-- Services Card --}}
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">{{ __('admin.Active Services') }}</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $activeServices ?? 0 }}</p>
                </div>
                <div class="p-3 bg-green-100 rounded-full">
                    <i class="fas fa-briefcase text-green-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-600 font-medium">{{ $totalServices ?? 0 }}</span>
                <span class="text-gray-500 ml-2">{{ __('admin.total services') }}</span>
            </div>
        </div>
    </div>

    {{-- Quick Actions --}}
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">{{ __('admin.Quick Actions') }}</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.portfolios.create') }}" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-indigo-50 transition-colors">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-2">
                    <i class="fas fa-plus text-indigo-600"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">{{ __('admin.Add Portfolio') }}</span>
            </a>
            <a href="{{ route('admin.services.create') }}" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-indigo-50 transition-colors">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-2">
                    <i class="fas fa-plus text-indigo-600"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">{{ __('admin.Add Service') }}</span>
            </a>
            <a href="{{ route('admin.quotes.index') }}" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-indigo-50 transition-colors">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-2">
                    <i class="fas fa-list text-indigo-600"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">{{ __('admin.View Quotes') }}</span>
            </a>
            <a href="{{ route('admin.contacts.index') }}" class="flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-indigo-50 transition-colors">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mb-2">
                    <i class="fas fa-envelope text-indigo-600"></i>
                </div>
                <span class="text-sm font-medium text-gray-700">{{ __('admin.Messages') }}</span>
            </a>
        </div>
    </div>

    {{-- Recent Quote Requests & Messages --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        {{-- Recent Quote Requests --}}
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">{{ __('admin.Recent Quote Requests') }}</h3>
                <a href="{{ route('admin.quotes.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800">
                    {{ __('admin.View All') }} <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('admin.Name') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Type') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('admin.Status') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Date') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($recentQuotes ?? [] as $quote)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $quote->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                {{ $quote->project_type_label }}
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
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $quote->created_at->format('d M Y') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                {{ __('admin.No quote requests yet') }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Recent Contact Messages --}}
        <div class="bg-white rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">{{ __('admin.Recent Messages') }}</h3>
                <a href="{{ route('admin.contacts.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800">
                    {{ __('admin.View All') }} <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="divide-y divide-gray-200">
                @forelse($recentMessages ?? [] as $message)
                <div class="px-6 py-4 hover:bg-gray-50 {{ !$message->is_read ? 'bg-indigo-50' : '' }}">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center space-x-2">
                                <h4 class="text-sm font-medium text-gray-900">{{ $message->name }}</h4>
                                @if(!$message->is_read)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-indigo-100 text-indigo-800">
                                        {{ __('admin.New') }}
                                    </span>
                                @endif
                            </div>
                            <p class="text-sm text-gray-600 mt-1">{{ Str::limit($message->subject, 50) }}</p>
                            <p class="text-sm text-gray-500 mt-1">{{ Str::limit($message->message, 80) }}</p>
                        </div>
                        <span class="text-xs text-gray-400 whitespace-nowrap ml-4">
                            {{ $message->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
                @empty
                <div class="px-6 py-4 text-center text-sm text-gray-500">
                    {{ __('admin.No messages yet') }}
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
