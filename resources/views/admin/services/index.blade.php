@extends('layouts.admin')

@section('title', __('admin.Services'))
@section('page_title', __('admin.Services'))

@section('content')
<div class="space-y-6">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ __('admin.Services') }}</h2>
            <p class="text-gray-600">{{ __('admin.Manage your services') }}</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>
            {{ __('admin.Add Service') }}
        </a>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Image') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('admin.Name') }}</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('admin.Status') }}</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($services ?? [] as $service)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($service->icon)
                                <img src="{{ asset('storage/' . $service->icon) }}" alt="{{ $service->name_id }}" class="h-12 w-12 object-contain">
                            @else
                                <div class="h-12 w-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-briefcase text-gray-400"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-medium text-gray-900">{{ $service->name_id }}</div>
                            @if($service->name_en)
                                <div class="text-sm text-gray-500">{{ $service->name_en }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($service->is_active)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ __('admin.Active') }}
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    {{ __('admin.Inactive') }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="text-indigo-600 hover:text-indigo-900" title="{{ __('Edit') }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="inline" onsubmit="return confirm('{{ addslashes(__('Are you sure you want to delete this service?')) }}')">
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
                        <td colspan="4" class="px-6 py-8 text-center text-gray-500">
                            <i class="fas fa-briefcase text-4xl mb-4 text-gray-300"></i>
                            <p>{{ __('admin.No services found') }}</p>
                            <a href="{{ route('admin.services.create') }}" class="text-indigo-600 hover:text-indigo-800 mt-2 inline-block">
                                {{ __('admin.Add Service') }}
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if(isset($services) && $services->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $services->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
