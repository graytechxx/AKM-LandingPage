@extends('layouts.app')

@section('title', __('meta.contact.title'))
@section('meta')
    <meta name="description" content="{{ __('meta.contact.description') }}">
    <meta name="keywords" content="{{ __('meta.contact.keywords') }}">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/contact-hero.jpg') }}" alt="{{ __('pages.contact.title') }}" 
                 class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/90 to-gray-900/70"></div>
        </div>
        
        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-amber-500 font-semibold text-sm uppercase tracking-wider mb-4 block">
                {{ __('pages.contact.subtitle') }}
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-white mb-6">
                {{ __('pages.contact.title') }}
            </h1>
            <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto">
                {{ __('pages.contact.description') }}
            </p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 max-w-6xl mx-auto">
                <!-- Contact Info -->
                <div>
                    <h2 class="text-3xl font-serif font-bold text-gray-900 mb-6">
                        {{ __('pages.contact.get_in_touch') }}
                    </h2>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        {{ __('pages.contact.get_in_touch_text') }}
                    </p>
                    
                    <div class="space-y-6">
                        <!-- Address -->
                        <div class="flex items-start">
                            <div class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-7 h-7 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">{{ __('pages.contact.address_title') }}</h3>
                                <p class="text-gray-600">
                                    Jl. Interior Design No. 123<br>
                                    Jakarta, Indonesia 12345
                                </p>
                            </div>
                        </div>
                        
                        <!-- Phone -->
                        <div class="flex items-start">
                            <div class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-7 h-7 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">{{ __('pages.contact.phone_title') }}</h3>
                                <p class="text-gray-600">
                                    <a href="tel:+622112345678" class="hover:text-amber-500 transition">+62 21 1234 5678</a>
                                </p>
                            </div>
                        </div>
                        
                        <!-- Email -->
                        <div class="flex items-start">
                            <div class="w-14 h-14 bg-amber-100 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-7 h-7 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">{{ __('pages.contact.email_title') }}</h3>
                                <p class="text-gray-600">
                                    <a href="mailto:info@ipminterior.com" class="hover:text-amber-500 transition">info@ipminterior.com</a>
                                </p>
                            </div>
                        </div>
                        
                        <!-- WhatsApp -->
                        <div class="flex items-start">
                            <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-7 h-7 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1">{{ __('pages.contact.whatsapp_title') }}</h3>
                                <p class="text-gray-600">
                                    <a href="https://wa.me/6285177907912" target="_blank" class="hover:text-green-500 transition">+62 851 7790 7912</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Business Hours -->
                    <div class="mt-10 p-6 bg-gray-100 rounded-xl">
                        <h3 class="font-bold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 text-amber-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ __('pages.contact.business_hours') }}
                        </h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">{{ __('pages.contact.weekdays') }}</span>
                                <span class="font-medium text-gray-900">09:00 - 18:00 WIB</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">{{ __('pages.contact.saturday') }}</span>
                                <span class="font-medium text-gray-900">09:00 - 15:00 WIB</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">{{ __('pages.contact.sunday') }}</span>
                                <span class="font-medium text-gray-500">{{ __('pages.contact.closed') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="bg-white rounded-2xl shadow-xl p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('pages.contact.form_title') }}</h2>
                    
                    <form action="{{ route('contact.store', app()->getLocale()) }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Display Validation Errors -->
                        @if($errors->any())
                            <div class="bg-red-50 border-l-4 border-red-500 p-4">
                                <div class="flex">
                                    <svg class="w-5 h-5 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <div>
                                        <p class="text-red-700 font-medium">{{ __('messages.errors.fix_following') }}</p>
                                        <ul class="mt-2 text-red-600 text-sm list-disc list-inside">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('forms.name') }} <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                   class="w-full px-4 py-3 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition"
                                   placeholder="{{ __('forms.placeholders.full_name') }}">
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('forms.email') }} <span class="text-red-500">*</span>
                            </label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                   class="w-full px-4 py-3 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition"
                                   placeholder="{{ __('forms.placeholders.email') }}">
                            @error('email')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('forms.phone') }}
                            </label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                   class="w-full px-4 py-3 border @error('phone') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition"
                                   placeholder="{{ __('forms.placeholders.phone_optional') }}">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Subject -->
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('forms.subject') }} <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
                                   class="w-full px-4 py-3 border @error('subject') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition"
                                   placeholder="{{ __('forms.placeholders.subject') }}">
                            @error('subject')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Message -->
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('forms.message') }} <span class="text-red-500">*</span>
                            </label>
                            <textarea id="message" name="message" rows="5" required
                                      class="w-full px-4 py-3 border @error('message') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition"
                                      placeholder="{{ __('forms.placeholders.message') }}">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full py-4 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-lg transition duration-300 transform hover:-translate-y-1 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            {{ __('messages.buttons.send_message') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Map Section (Placeholder) -->
    <section class="h-[400px] bg-gray-300 relative">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center">
                <svg class="w-16 h-16 text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <p class="text-gray-600 font-medium">{{ __('pages.contact.map_placeholder') }}</p>
            </div>
        </div>
    </section>
@endsection
