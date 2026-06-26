@extends('layouts.admin')

@section('title', __('Contact Messages'))
@section('page_title', __('Contact Messages'))

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ __('Contact Messages') }}</h2>
            <p class="text-gray-600">{{ __('Manage contact form submissions') }}</p>
        </div>
    </div>

    {{-- Filter Tabs --}}
    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.contacts.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium {{ !request('filter') ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors">
                {{ __('All') }}
            </a>
            <a href="{{ route('admin.contacts.index', ['filter' => 'unread']) }}" class="px-4 py-2 rounded-lg text-sm font-medium {{ request('filter') == 'unread' ? 'bg-yellow-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors">
                {{ __('Unread') }}
                <span class="ml-2 px-2 py-0.5 text-xs rounded-full {{ request('filter') == 'unread' ? 'bg-white text-yellow-600' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ $unreadCount ?? 0 }}
                </span>
            </a>
            <a href="{{ route('admin.contacts.index', ['filter' => 'read']) }}" class="px-4 py-2 rounded-lg text-sm font-medium {{ request('filter') == 'read' ? 'bg-green-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }} transition-colors">
                {{ __('Read') }}
            </a>
        </div>
    </div>

    {{-- Search --}}
    <div class="bg-white rounded-lg shadow-sm p-4">
        <form method="GET" action="{{ route('admin.contacts.index') }}" class="flex flex-col sm:flex-row gap-4">
            <input type="hidden" name="filter" value="{{ request('filter') }}">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ __('Search by name, email, subject...') }}" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                <i class="fas fa-search mr-2"></i>{{ __('Search') }}
            </button>
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('ID') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Name') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Subject') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Date') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Status') }}</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($messages ?? [] as $message)
                    <tr class="hover:bg-gray-50 {{ !$message->is_read ? 'bg-indigo-50' : '' }}">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            #{{ $message->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $message->name }}</div>
                            <div class="text-sm text-gray-500">{{ $message->email }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 max-w-xs truncate">{{ $message->subject }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $message->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($message->is_read)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ __('Read') }}
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    {{ __('Unread') }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.contacts.show', $message) }}" class="text-indigo-600 hover:text-indigo-900 mr-3" title="{{ __('View') }}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.contacts.destroy', $message) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Are you sure you want to delete this message?') }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" title="{{ __('Delete') }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            <i class="fas fa-inbox text-4xl mb-4 text-gray-300"></i>
                            <p>{{ __('No contact messages found') }}</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(isset($messages) && $messages->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $messages->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
