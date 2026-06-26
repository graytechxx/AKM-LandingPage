@extends('layouts.app')

@section('title', __('Terms of Service'))
@section('meta_description', __('Terms of Service - IPM Interior Design'))

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h1 class="text-3xl font-serif font-bold text-gray-900 mb-8">{{ __('Terms of Service') }}</h1>
    <div class="prose prose-gray max-w-none text-gray-600 space-y-4">
        <p>{{ __('By using our website and services, you agree to these terms. Please read them carefully.') }}</p>
        <p>{{ __('IPM Interior Design reserves the right to modify these terms at any time. Continued use of the site after changes constitutes acceptance.') }}</p>
        <p>{{ __('For any questions about these terms, please contact us.') }}</p>
    </div>
    <a href="{{ route('landing.' . app()->getLocale()) }}" class="inline-flex items-center mt-8 text-amber-600 hover:text-amber-700 font-medium">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        {{ __('messages.buttons.back_to_home') }}
    </a>
</div>
@endsection
