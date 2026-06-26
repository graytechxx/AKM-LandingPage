@extends('layouts.app')

@section('title', __('Login'))
@section('meta')
    <meta name="robots" content="noindex, nofollow">
@endsection

@section('content')
<div class="min-h-[60vh] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-900">{{ __('Login') }}</h1>
                <p class="mt-2 text-sm text-gray-600">{{ __('Login ke Admin Panel IPM Interior Design') }}</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-sm text-red-700 font-medium">{{ __('Email atau password salah.') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 @error('email') border-red-500 @enderror"
                           placeholder="admin@ipm.com">
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember"
                           class="w-4 h-4 rounded border-gray-300 text-amber-500 focus:ring-amber-500">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-700">{{ __('Ingat saya') }}</label>
                </div>

                <div>
                    <button type="submit"
                            class="w-full py-3 px-4 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-lg transition duration-300 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>

            <p class="mt-6 text-center text-sm text-gray-500">
                <a href="{{ url('/') }}" class="text-amber-600 hover:text-amber-500 font-medium">{{ __('Kembali ke Beranda') }}</a>
            </p>
        </div>
    </div>
</div>
@endsection
