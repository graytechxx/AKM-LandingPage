@extends('layouts.admin')

@section('title', __('Quote Details'))
@section('page_title', __('Quote Request Details'))

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('admin.quotes.index') }}" class="text-indigo-600 hover:text-indigo-800">
            <i class="fas fa-arrow-left mr-2"></i>{{ __('Back to Quotes') }}
        </a>
        <div class="flex gap-2">
            @if($quote->status != 'accepted' && $quote->status != 'rejected')
            <form action="{{ route('admin.quotes.status', $quote) }}" method="POST" class="inline">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="accepted">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                    <i class="fas fa-check mr-2"></i>{{ __('Mark as Accepted') }}
                </button>
            </form>
            <form action="{{ route('admin.quotes.status', $quote) }}" method="POST" class="inline">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="rejected">
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                    <i class="fas fa-times mr-2"></i>{{ __('Reject') }}
                </button>
            </form>
            @endif
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Main Information --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Customer Info --}}
            <div class="bg-white rounded-lg shadow-sm">
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-800">{{ __('Customer Information') }}</h3>
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
                    <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full {{ $statusColor }}">
                        {{ $quote->status_label }}
                    </span>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">{{ __('Name') }}</label>
                        <p class="mt-1 text-base font-medium text-gray-900">{{ $quote->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">{{ __('Email') }}</label>
                        <p class="mt-1 text-base text-gray-900">{{ $quote->email }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">{{ __('Phone') }}</label>
                        <p class="mt-1 text-base text-gray-900">{{ $quote->phone }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">{{ __('Submitted On') }}</label>
                        <p class="mt-1 text-base text-gray-900">{{ $quote->created_at->format('d F Y, H:i') }}</p>
                    </div>
                </div>
            </div>

            {{-- Project Details --}}
            <div class="bg-white rounded-lg shadow-sm">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">{{ __('Project Details') }}</h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">{{ __('Project Type') }}</label>
                        <p class="mt-1 text-base font-medium text-gray-900">{{ $quote->project_type_label }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">{{ __('Location') }}</label>
                        <p class="mt-1 text-base text-gray-900">{{ $quote->location }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">{{ __('Area') }}</label>
                        <p class="mt-1 text-base text-gray-900">{{ $quote->area_sqm }} m²</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">{{ __('Timeline') }}</label>
                        <p class="mt-1 text-base text-gray-900">{{ $quote->timeline_label }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500">{{ __('Budget Range') }}</label>
                        <p class="mt-1 text-base text-gray-900">{{ $quote->budget_range_label }}</p>
                    </div>
                </div>
                <div class="px-6 pb-6">
                    <label class="block text-sm font-medium text-gray-500 mb-2">{{ __('Project Description') }}</label>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-900 whitespace-pre-wrap">{{ $quote->description }}</p>
                    </div>
                </div>
            </div>

            {{-- Reference Images --}}
            @if($quote->reference_images && count($quote->reference_images) > 0)
            <div class="bg-white rounded-lg shadow-sm">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">{{ __('Reference Images') }}</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($quote->reference_images as $image)
                            <div class="relative group">
                                <img src="{{ asset('storage/' . $image) }}" alt="Reference" class="h-32 w-full object-cover rounded-lg cursor-pointer hover:opacity-75 transition-opacity" onclick="window.open(this.src, '_blank')">
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <i class="fas fa-expand text-white text-2xl drop-shadow-lg"></i>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            {{-- Status Update --}}
            <div class="bg-white rounded-lg shadow-sm">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">{{ __('Update Status') }}</h3>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.quotes.status', $quote) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-4">
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Status') }}</label>
                                <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                    @foreach($quote::STATUSES as $key => $label)
                                        <option value="{{ $key }}" {{ $quote->status == $key ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="w-full px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                                {{ __('Update Status') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Send Quote --}}
            <div class="bg-white rounded-lg shadow-sm">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">{{ __('Send Quote') }}</h3>
                </div>
                <div class="p-6">
                    <form action="{{ route('admin.quotes.send', $quote) }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="quoted_price" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Quoted Price (Rp)') }}</label>
                                <input type="number" name="quoted_price" id="quoted_price" value="{{ old('quoted_price', $quote->quoted_price) }}" step="0.01" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="50000000">
                            </div>
                            <div>
                                <label for="admin_notes" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Notes / Quote Details') }}</label>
                                <textarea name="admin_notes" id="admin_notes" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="{{ __('Enter quote details, terms, and conditions...') }}">{{ old('admin_notes', $quote->admin_notes) }}</textarea>
                            </div>
                            <button type="submit" class="w-full px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                <i class="fas fa-paper-plane mr-2"></i>{{ __('Send Quote') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Current Quote Info --}}
            @if($quote->quoted_price)
            <div class="bg-white rounded-lg shadow-sm">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">{{ __('Current Quote') }}</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">{{ __('Quoted Price') }}</label>
                        <p class="mt-1 text-xl font-bold text-indigo-600">Rp {{ number_format($quote->quoted_price, 0, ',', '.') }}</p>
                    </div>
                    @if($quote->admin_notes)
                    <div>
                        <label class="block text-sm font-medium text-gray-500">{{ __('Notes') }}</label>
                        <p class="mt-1 text-sm text-gray-700 whitespace-pre-wrap">{{ $quote->admin_notes }}</p>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
