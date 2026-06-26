@extends('layouts.admin')

@section('title', __('Message Detail'))
@section('page_title', __('Contact Message'))

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route('admin.contacts.index') }}" class="text-indigo-600 hover:text-indigo-800">
            <i class="fas fa-arrow-left mr-2"></i>{{ __('Back to Messages') }}
        </a>
        <form action="{{ route('admin.contacts.destroy', $message) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Are you sure you want to delete this message?') }}');">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                <i class="fas fa-trash mr-2"></i>{{ __('Delete') }}
            </button>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-800">{{ $message->subject }}</h3>
            <span class="text-sm text-gray-500">{{ $message->created_at->format('d F Y, H:i') }}</span>
        </div>
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-500">{{ __('Name') }}</label>
                    <p class="mt-1 text-base font-medium text-gray-900">{{ $message->name }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">{{ __('Email') }}</label>
                    <p class="mt-1 text-base text-gray-900">{{ $message->email }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">{{ __('Phone') }}</label>
                    <p class="mt-1 text-base text-gray-900">{{ $message->phone ?? '-' }}</p>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-2">{{ __('Message') }}</label>
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-gray-900 whitespace-pre-wrap">{{ $message->message }}</p>
                </div>
            </div>
            @if(!$message->is_read)
            <form action="{{ route('admin.contacts.read', $message) }}" method="POST" class="inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    <i class="fas fa-check mr-2"></i>{{ __('Mark as Read') }}
                </button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
