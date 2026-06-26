@extends('layouts.app')

@section('title', __('meta.pricing.title'))
@section('meta')
    <meta name="description" content="{{ __('meta.pricing.description') }}">
    <meta name="keywords" content="{{ __('meta.pricing.keywords') }}">
@endsection

@php
    $locale = app()->getLocale();
    $whatsapp_number = \App\Models\Setting::get('whatsapp_number', '6285177907912');
    $whatsapp_message = $locale === 'en' ? \App\Models\Setting::get('whatsapp_message_en', 'Hello, I am interested in IPM Interior Design services') : \App\Models\Setting::get('whatsapp_message_id', 'Halo, saya tertarik dengan layanan IPM Interior Design');
    $wa_link = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $whatsapp_number) . '?text=' . rawurlencode($whatsapp_message);
@endphp

@section('content')
    <!-- Hero Section -->
    <section class="relative py-12 md:py-24 bg-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/pricing-hero.jpg') }}" alt="{{ __('pages.pricing.title') }}" 
                 class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/90 to-gray-900/70"></div>
        </div>
        
        <div class="relative z-10 container mx-auto px-3 sm:px-4 md:px-6 lg:px-8 text-center">
            <span class="text-amber-500 font-semibold text-xs sm:text-sm uppercase tracking-wider mb-2 md:mb-4 block">
                {{ __('pages.pricing.subtitle') }}
            </span>
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-serif font-bold text-white mb-3 md:mb-6 px-2">
                {{ __('pages.pricing.title') }}
            </h1>
            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-300 max-w-3xl mx-auto px-2">
                {{ __('pages.pricing.description') }}
            </p>
        </div>
    </section>


    <!-- Main Pricing Section -->
    <section class="py-16 md:py-24 lg:py-32 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Intro -->
            <div class="text-center mb-16 md:mb-20 lg:mb-24">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-serif font-bold text-gray-900 mb-6">
                    {{ app()->getLocale() === 'en' ? 'Simple, Transparent Pricing' : 'Harga Sederhana & Transparan' }}
                </h2>
                <p class="text-gray-600 text-base md:text-lg max-w-2xl mx-auto mb-10">
                    {{ app()->getLocale() === 'en' ? 'Professional interior design at affordable rates. No hidden costs. Perfect for any budget.' : 'Desain interior profesional dengan harga terjangkau. Tidak ada biaya tersembunyi. Cocok untuk semua budget.' }}
                </p>

                <!-- Main Pricing Card -->
                <div class="bg-gradient-to-br from-amber-500/10 to-amber-600/10 border-2 border-amber-500/30 rounded-3xl p-10 md:p-16 mb-12 inline-block">
                    <p class="text-amber-600 font-semibold text-sm md:text-base mb-2">{{ app()->getLocale() === 'en' ? 'STARTING PRICE' : 'HARGA MULAI' }}</p>
                    <div class="flex items-center justify-center gap-3">
                        <span class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900">Rp 2.000.000</span>
                        <div class="text-left">
                            <p class="text-2xl md:text-3xl font-bold text-gray-700">/m²</p>
                            <p class="text-xs md:text-sm text-gray-600">per square meter</p>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm md:text-base mt-4">
                        {{ app()->getLocale() === 'en' ? 'Based on project scope & requirements' : 'Berdasarkan ruang lingkup & kebutuhan proyek' }}
                    </p>
                </div>
            </div>

            <!-- Custom Interior Section -->
            <div class="mb-20">
                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 text-center">{{ app()->getLocale() === 'en' ? 'Custom Interior' : 'Custom Interior' }}</h3>
                <p class="text-amber-600 font-semibold text-sm md:text-base mb-12 text-center">{{ app()->getLocale() === 'en' ? 'Per element / Flexible' : 'Per elemen / fleksibel' }}</p>
                
                <div class="max-w-3xl mx-auto bg-white border border-gray-200 rounded-2xl p-8 md:p-12 hover:shadow-xl hover:border-amber-500 transition duration-300">
                    <div class="mb-8">
                        <p class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Rp 2 – 2,5 Juta</p>
                        <p class="text-amber-600 font-semibold text-sm">{{ app()->getLocale() === 'en' ? '/ per meter' : '/ meter' }}</p>
                    </div>
                    
                    <p class="text-gray-700 text-base md:text-lg mb-8 leading-relaxed">
                        {{ app()->getLocale() === 'en' ? 'For various needs—from residential to workspace, designed according to the details you want.' : 'Untuk berbagai kebutuhan—dari hunian hingga ruang kerja, dirancang sesuai detail yang Anda inginkan.' }}
                    </p>
                    
                    <a href="{{ $wa_link }}" 
                       target="_blank" rel="noopener noreferrer"
                       class="inline-block px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition duration-300">
                        {{ app()->getLocale() === 'en' ? 'Chat on WhatsApp' : 'Chat di WhatsApp' }}
                    </a>
                </div>
            </div>

            <!-- Interior Packages Section -->
            <div class="mb-8">
                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2 text-center">{{ app()->getLocale() === 'en' ? 'Interior Packages' : 'Paket Interior' }}</h3>
                <p class="text-amber-600 font-semibold text-sm md:text-base mb-12 text-center">{{ app()->getLocale() === 'en' ? 'Per room / Comprehensive' : 'Per ruang / menyeluruh' }}</p>
                
                <div class="grid md:grid-cols-2 gap-8 lg:gap-10 max-w-5xl mx-auto">
                    <!-- Studio Space Package -->
                    <div class="group relative bg-white rounded-3xl border-2 border-gray-200 hover:border-amber-500 hover:shadow-2xl transition-all duration-300 overflow-hidden">
                        <!-- Background accent -->
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-amber-100 to-amber-50 rounded-full -mr-16 -mt-16 group-hover:scale-110 transition-transform duration-300 opacity-0 group-hover:opacity-100"></div>
                        
                        <div class="relative p-8 md:p-10 z-10">
                            <!-- Icon -->
                            <div class="w-16 h-16 bg-gradient-to-br from-amber-400 to-amber-600 rounded-2xl flex items-center justify-center mb-6 group-hover:shadow-lg group-hover:scale-110 transition-all duration-300">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 3l3-3m0 0l3 3m-3-3v10"></path>
                                </svg>
                            </div>
                            
                            <!-- Title -->
                            <h4 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">{{ app()->getLocale() === 'en' ? 'Studio Space' : 'Ruang Studio' }}</h4>
                            <p class="text-gray-600 text-sm md:text-base mb-6">{{ app()->getLocale() === 'en' ? 'Perfect for compact living' : 'Sempurna untuk hunian kompak' }}</p>
                            
                            <!-- Price -->
                            <div class="bg-gradient-to-r from-amber-50 to-orange-50 rounded-2xl p-6 mb-6 border border-amber-100">
                                <p class="text-amber-600 font-semibold text-sm mb-2">{{ app()->getLocale() === 'en' ? 'Starting from' : 'Mulai dari' }}</p>
                                <p class="text-4xl font-bold text-gray-900">Rp 45 Jt</p>
                                <p class="text-gray-600 text-sm mt-2">{{ app()->getLocale() === 'en' ? 'Package price' : 'Harga paket' }}</p>
                            </div>
                            
                            <!-- Features -->
                            <div class="space-y-3 mb-8">
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-amber-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-700 text-sm">{{ app()->getLocale() === 'en' ? 'Complete design concept' : 'Konsep desain lengkap' }}</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-amber-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-700 text-sm">{{ app()->getLocale() === 'en' ? '3D visualization' : 'Visualisasi 3D' }}</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-amber-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-700 text-sm">{{ app()->getLocale() === 'en' ? 'Material specifications' : 'Spesifikasi material' }}</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-amber-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-gray-700 text-sm">{{ app()->getLocale() === 'en' ? '2x design revisions' : 'Revisi desain 2x' }}</span>
                                </div>
                            </div>
                            
                            <!-- CTA Button -->
                            <a href="{{ $wa_link }}" 
                               target="_blank" rel="noopener noreferrer"
                               class="block w-full py-3 text-center bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold rounded-xl transition-all duration-300 transform group-hover:shadow-lg group-hover:scale-105">
                                {{ app()->getLocale() === 'en' ? 'Konsultasi Gratis' : 'Free Consultation' }}
                            </a>
                        </div>
                    </div>
                    
                    <!-- 2-Room Space Package (Featured) -->
                    <div class="group relative">
                        <!-- Shine effect for popular badge -->
                        <div class="absolute -top-1 -right-1 z-20">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-amber-400 to-amber-600 rounded-full blur-lg opacity-75 group-hover:opacity-100 animate-pulse"></div>
                                <span class="relative inline-block px-4 py-2 bg-gradient-to-r from-amber-400 to-amber-600 text-white font-bold text-xs rounded-full shadow-lg">⭐ {{ app()->getLocale() === 'en' ? 'POPULAR' : 'POPULER' }}</span>
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-br from-amber-50 via-white to-orange-50 rounded-3xl border-2 border-amber-300 hover:border-amber-500 shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden">
                            <!-- Background accent -->
                            <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-br from-amber-200 to-amber-100 rounded-full -mr-20 -mt-20 group-hover:scale-125 transition-transform duration-300 opacity-30 group-hover:opacity-50"></div>
                            
                            <div class="relative p-8 md:p-10 z-10">
                                <!-- Icon -->
                                <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-amber-700 rounded-2xl flex items-center justify-center mb-6 group-hover:shadow-lg group-hover:scale-110 transition-all duration-300 shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                                    </svg>
                                </div>
                                
                                <!-- Title -->
                                <h4 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">{{ app()->getLocale() === 'en' ? '2-Room Space' : 'Ruang 2 Kamar' }}</h4>
                                <p class="text-gray-600 text-sm md:text-base mb-6">{{ app()->getLocale() === 'en' ? 'Ideal untuk keluarga kecil' : 'Perfect for small family' }}</p>
                                
                                <!-- Price -->
                                <div class="bg-gradient-to-r from-white to-amber-50 rounded-2xl p-6 mb-6 border-2 border-amber-200 shadow-sm">
                                    <p class="text-amber-600 font-bold text-sm mb-2">{{ app()->getLocale() === 'en' ? 'Starting from' : 'Mulai dari' }}</p>
                                    <p class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-amber-600 to-orange-600 bg-clip-text text-transparent">Rp 60 Jt</p>
                                    <p class="text-gray-600 text-sm mt-2">{{ app()->getLocale() === 'en' ? 'Best value' : 'Nilai terbaik' }}</p>
                                </div>
                                
                                <!-- Features -->
                                <div class="space-y-3 mb-8">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-amber-600 mr-3 mt-0.5 flex-shrink-0 font-bold" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-gray-700 text-sm font-medium">{{ app()->getLocale() === 'en' ? 'Konsep desain lengkap' : 'Complete design concept' }}</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-amber-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-gray-700 text-sm font-medium">{{ app()->getLocale() === 'en' ? 'Visualisasi 3D & gambar kerja' : '3D visualization & drawings' }}</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-amber-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-gray-700 text-sm font-medium">{{ app()->getLocale() === 'en' ? 'Furniture layout planning' : 'Perencanaan layout furniture' }}</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-amber-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-gray-700 text-sm font-medium">{{ app()->getLocale() === 'en' ? 'Unlimited revisions' : 'Revisi unlimited' }}</span>
                                    </div>
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-amber-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="text-gray-700 text-sm font-medium">{{ app()->getLocale() === 'en' ? '4x supervision site visit' : 'Supervisi 4x kunjungan' }}</span>
                                    </div>
                                </div>
                                
                                <!-- CTA Button -->
                                <a href="{{ $wa_link }}" 
                                   target="_blank" rel="noopener noreferrer"
                                   class="block w-full py-3 text-center bg-gradient-to-r from-amber-500 via-amber-600 to-orange-600 hover:from-amber-600 hover:via-amber-700 hover:to-orange-700 text-white font-bold rounded-xl transition-all duration-300 transform group-hover:shadow-xl group-hover:scale-105 shadow-lg">
                                    {{ app()->getLocale() === 'en' ? '🎯 Konsultasi Gratis Sekarang' : '🎯 Free Consultation Now' }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Info Text -->
            <div class="text-center mt-16 md:mt-20 p-8 bg-amber-50 rounded-2xl border border-amber-200">
                <h4 class="text-lg font-bold text-gray-900 mb-3">{{ app()->getLocale() === 'en' ? 'Why Choose Our Pricing?' : 'Mengapa Memilih Harga Kami?' }}</h4>
                <p class="text-gray-700 max-w-3xl mx-auto">
                    {{ app()->getLocale() === 'en' ? 'Transparent pricing with no hidden fees. All packages include professional consultation, concept design, and material recommendations. Additional services can be customized based on your specific needs and budget.' : 'Harga transparan tanpa biaya tersembunyi. Semua paket termasuk konsultasi profesional, desain konsep, dan rekomendasi material. Layanan tambahan dapat disesuaikan dengan kebutuhan dan budget Anda.' }}
                </p>
            </div>
        </div>
    </section>



    <!-- What's Included Section -->
    <section class="py-16 md:py-24 lg:py-32 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-gray-900 mb-4">
                    {{ app()->getLocale() === 'en' ? 'What\'s Included in Every Project' : 'Yang Termasuk di Setiap Proyek' }}
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    {{ app()->getLocale() === 'en' ? 'All our projects include these comprehensive services, regardless of package size' : 'Semua proyek kami mencakup layanan komprehensif ini, terlepas dari ukuran paket' }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10 max-w-6xl mx-auto">
                <!-- Feature 1 -->
                <div class="p-6 bg-gray-50 rounded-xl hover:shadow-lg transition">
                    <div class="bg-amber-100 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ app()->getLocale() === 'en' ? 'Site Survey & Analysis' : 'Survey Lokasi & Analisis' }}</h3>
                    <p class="text-gray-600 text-sm">{{ app()->getLocale() === 'en' ? 'Comprehensive assessment of your space, measurements, and requirements' : 'Penilaian menyeluruh ruang, pengukuran, dan kebutuhan Anda' }}</p>
                </div>

                <!-- Feature 2 -->
                <div class="p-6 bg-gray-50 rounded-xl hover:shadow-lg transition">
                    <div class="bg-amber-100 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ app()->getLocale() === 'en' ? 'Concept Design' : 'Desain Konsep' }}</h3>
                    <p class="text-gray-600 text-sm">{{ app()->getLocale() === 'en' ? 'Professional design concepts with sketches, layouts, and visual presentations' : 'Konsep desain profesional dengan sketsa, layout, dan presentasi visual' }}</p>
                </div>

                <!-- Feature 3 -->
                <div class="p-6 bg-gray-50 rounded-xl hover:shadow-lg transition">
                    <div class="bg-amber-100 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ app()->getLocale() === 'en' ? 'Material & Color Selection' : 'Pemilihan Material & Warna' }}</h3>
                    <p class="text-gray-600 text-sm">{{ app()->getLocale() === 'en' ? 'Expert recommendations for materials, colors, and finishes matching your style' : 'Rekomendasi ahli untuk material, warna, dan finishing sesuai gaya Anda' }}</p>
                </div>

                <!-- Feature 4 -->
                <div class="p-6 bg-gray-50 rounded-xl hover:shadow-lg transition">
                    <div class="bg-amber-100 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ app()->getLocale() === 'en' ? 'Technical Drawings' : 'Gambar Teknis' }}</h3>
                    <p class="text-gray-600 text-sm">{{ app()->getLocale() === 'en' ? 'Detailed technical specifications and working drawings for execution' : 'Spesifikasi teknis detail dan gambar kerja untuk eksekusi' }}</p>
                </div>

                <!-- Feature 5 -->
                <div class="p-6 bg-gray-50 rounded-xl hover:shadow-lg transition">
                    <div class="bg-amber-100 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ app()->getLocale() === 'en' ? 'Design Revisions' : 'Revisi Desain' }}</h3>
                    <p class="text-gray-600 text-sm">{{ app()->getLocale() === 'en' ? 'Unlimited revisions to ensure your design meets your expectations' : 'Revisi unlimited untuk memastikan desain sesuai ekspektasi Anda' }}</p>
                </div>

                <!-- Feature 6 -->
                <div class="p-6 bg-gray-50 rounded-xl hover:shadow-lg transition">
                    <div class="bg-amber-100 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">{{ app()->getLocale() === 'en' ? 'Professional Consultation' : 'Konsultasi Profesional' }}</h3>
                    <p class="text-gray-600 text-sm">{{ app()->getLocale() === 'en' ? 'Ongoing support and expert advice throughout your project' : 'Dukungan berkelanjutan dan saran ahli sepanjang proyek Anda' }}</p>
                </div>
            </div>
        </div>
    </section>

@endsection
