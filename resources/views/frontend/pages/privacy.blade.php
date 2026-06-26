@extends('layouts.app')

@section('title', __('Privacy Policy'))
@section('meta_description', __('Privacy Policy - IPM Interior Design'))

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <h1 class="text-3xl font-serif font-bold text-gray-900 mb-8">{{ __('Privacy Policy') }}</h1>
    <div class="prose prose-gray max-w-none text-gray-600 space-y-4">
        <p>{{ __('This page describes how IPM Interior Design collects, uses, and protects your personal information when you use our website and services.') }}</p>
        <p>{{ __('We may update this policy from time to time. Please check this page periodically for changes.') }}</p>
        <p>{{ __('For questions regarding this policy, please contact us through the contact information provided on our website.') }}</p>
    </div>
    <a href="{{ route('landing.' . app()->getLocale()) }}" class="inline-flex items-center mt-8 text-amber-600 hover:text-amber-700 font-medium">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        {{ __('messages.buttons.back_to_home') }}
    </a>
</div>
@endsection
