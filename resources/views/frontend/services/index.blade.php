@extends('layouts.app')

@section('title', __('meta.services.title'))
@section('meta')
    <meta name="description" content="{{ __('meta.services.description') }}">
    <meta name="keywords" content="{{ __('meta.services.keywords') }}">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative py-12 md:py-24 bg-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/services-hero.jpg') }}" alt="{{ __('pages.services.title') }}" 
                 class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/90 to-gray-900/70"></div>
        </div>
        
        <div class="relative z-10 container mx-auto px-3 sm:px-4 md:px-6 lg:px-8 text-center">
            <span class="text-amber-500 font-semibold text-xs sm:text-sm uppercase tracking-wider mb-2 md:mb-4 block">
                {{ __('pages.services.subtitle') }}
            </span>
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-serif font-bold text-white mb-3 md:mb-6 px-2">
                {{ __('pages.services.title') }}
            </h1>
            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-300 max-w-3xl mx-auto px-2">
                {{ __('pages.services.description') }}
            </p>
        </div>
    </section>

    <!-- Services Cards -->
    <section class="py-16 md:py-24 lg:py-32 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-10">
                <!-- Service 1: Consultation -->
                <div class="group relative bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-2xl hover:border-amber-500 transition duration-300">
                    <div class="p-8 pb-0">
                        <div class="w-16 h-16 bg-amber-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-amber-500 transition duration-300">
                            <svg class="w-8 h-8 text-amber-500 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">
                            {{ app()->getLocale() === 'en' ? 'Design Consultation' : 'Konsultasi Desain' }}
                        </h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            {{ app()->getLocale() === 'en' ? 'Get expert advice and guidance on your interior design project. Our professional consultants will understand your needs and vision.' : 'Dapatkan konsultasi ahli tentang proyek desain interior Anda. Konsultan profesional kami akan memahami kebutuhan dan visi Anda.' }}
                        </p>
                    </div>
                    
                    <div class="px-8 pb-8">
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-amber-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 text-sm">{{ app()->getLocale() === 'en' ? 'Site analysis and assessment' : 'Analisis dan penilaian lokasi' }}</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-amber-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 text-sm">{{ app()->getLocale() === 'en' ? 'Style and concept development' : 'Pengembangan gaya dan konsep' }}</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-amber-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 text-sm">{{ app()->getLocale() === 'en' ? 'Budget and timeline planning' : 'Perencanaan anggaran dan jadwal' }}</span>
                            </li>
                        </ul>
                        
                        <div class="pt-6 border-t border-gray-100">
                            <a href="https://wa.me/{{ str_replace('+', '', \App\Models\Setting::get('whatsapp_number', '6285177907912')) }}?text={{ urlencode(app()->getLocale() === 'en' ? 'Hi, I\'m interested in design consultation' : 'Halo, saya tertarik konsultasi desain interior') }}" 
                               target="_blank" rel="noopener noreferrer"
                               class="block w-full py-3 text-center rounded-lg font-semibold transition duration-300 bg-green-600 hover:bg-green-700 text-white">
                                {{ app()->getLocale() === 'en' ? 'Chat on WhatsApp' : 'Chat di WhatsApp' }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 2: Interior Renovation -->
                <div class="group relative bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-2xl hover:border-amber-500 transition duration-300">
                    <div class="p-8 pb-0">
                        <div class="w-16 h-16 bg-amber-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-amber-500 transition duration-300">
                            <svg class="w-8 h-8 text-amber-500 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">
                            {{ app()->getLocale() === 'en' ? 'Interior Renovation' : 'Renovasi Interior' }}
                        </h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            {{ app()->getLocale() === 'en' ? 'Complete interior renovation services to transform your space. From concept to completion, we handle every detail with precision.' : 'Layanan renovasi interior lengkap untuk mengubah ruang Anda. Dari konsep hingga selesai, kami menangani setiap detail dengan presisi.' }}
                        </p>
                    </div>
                    
                    <div class="px-8 pb-8">
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-amber-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 text-sm">{{ app()->getLocale() === 'en' ? 'Design implementation' : 'Implementasi desain' }}</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-amber-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 text-sm">{{ app()->getLocale() === 'en' ? 'Quality material selection' : 'Pemilihan material berkualitas' }}</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-amber-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 text-sm">{{ app()->getLocale() === 'en' ? 'Professional project management' : 'Manajemen proyek profesional' }}</span>
                            </li>
                        </ul>
                        
                        <div class="pt-6 border-t border-gray-100">
                            <a href="{{ route('pricing.' . app()->getLocale()) }}" 
                               class="block w-full py-3 text-center rounded-lg font-semibold transition duration-300 bg-gray-900 hover:bg-amber-500 text-white">
                                {{ __('pages.services.view_pricing') }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Service 3: Custom Furniture -->
                <div class="group relative bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-2xl hover:border-amber-500 transition duration-300">
                    <div class="p-8 pb-0">
                        <div class="w-16 h-16 bg-amber-100 rounded-xl flex items-center justify-center mb-6 group-hover:bg-amber-500 transition duration-300">
                            <svg class="w-8 h-8 text-amber-500 group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">
                            {{ app()->getLocale() === 'en' ? 'Custom Furniture' : 'Furniture Custom' }}
                        </h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            {{ app()->getLocale() === 'en' ? 'Bespoke furniture solutions tailored to your space. Each piece is designed and crafted to your specifications and style preferences.' : 'Solusi furniture khusus yang disesuaikan dengan ruang Anda. Setiap potongan dirancang dan dibuat sesuai spesifikasi dan preferensi gaya Anda.' }}
                        </p>
                    </div>
                    
                    <div class="px-8 pb-8">
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-amber-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 text-sm">{{ app()->getLocale() === 'en' ? 'Custom design and fabrication' : 'Desain dan fabrikasi custom' }}</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-amber-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 text-sm">{{ app()->getLocale() === 'en' ? 'Material and finish selection' : 'Pemilihan material dan finishing' }}</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-amber-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 text-sm">{{ app()->getLocale() === 'en' ? 'Installation and warranty' : 'Instalasi dan garansi' }}</span>
                            </li>
                        </ul>
                        
                        <div class="pt-6 border-t border-gray-100">
                            <a href="{{ route('pricing.' . app()->getLocale()) }}" 
                               class="block w-full py-3 text-center rounded-lg font-semibold transition duration-300 bg-gray-900 hover:bg-amber-500 text-white">
                                {{ __('pages.services.view_pricing') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process/Timeline Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-amber-500 font-semibold text-sm uppercase tracking-wider mb-4 block">
                    {{ __('pages.services.process_subtitle') }}
                </span>
                <h2 class="text-3xl md:text-4xl font-serif font-bold text-gray-900">
                    {{ __('pages.services.process_title') }}
                </h2>
            </div>
            
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-4 md:left-1/2 transform md:-translate-x-1/2 h-full w-1 bg-amber-200"></div>
                
                <div class="space-y-12 md:space-y-0">
                    <!-- Step 1 -->
                    <div class="relative md:flex items-center justify-between">
                        <div class="hidden md:block w-5/12"></div>
                        <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 w-12 h-12 bg-amber-500 rounded-full flex items-center justify-center text-white font-bold z-10">
                            1
                        </div>
                        <div class="pl-12 md:pl-12 md:w-5/12">
                            <div class="bg-white p-6 rounded-xl shadow-lg">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('pages.services.steps.consultation.title') }}</h3>
                                <p class="text-gray-600">{{ __('pages.services.steps.consultation.description') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="relative md:flex items-center justify-between animate-fade-in">
                        <div class="pl-12 md:pl-0 md:pr-12 md:w-5/12 md:text-right">
                            <div class="bg-white p-6 rounded-xl shadow-lg">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('pages.services.steps.design.title') }}</h3>
                                <p class="text-gray-600">{{ __('pages.services.steps.design.description') }}</p>
                            </div>
                        </div>
                        <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 w-12 h-12 bg-amber-500 rounded-full flex items-center justify-center text-white font-bold z-10">
                            2
                        </div>
                        <div class="hidden md:block w-5/12"></div>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="relative md:flex items-center justify-between animate-fade-in">
                        <div class="hidden md:block w-5/12"></div>
                        <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 w-12 h-12 bg-amber-500 rounded-full flex items-center justify-center text-white font-bold z-10">
                            3
                        </div>
                        <div class="pl-12 md:pl-12 md:w-5/12">
                            <div class="bg-white p-6 rounded-xl shadow-lg">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('pages.services.steps.implementation.title') }}</h3>
                                <p class="text-gray-600">{{ __('pages.services.steps.implementation.description') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="relative md:flex items-center justify-between animate-fade-in">
                        <div class="pl-12 md:pl-0 md:pr-12 md:w-5/12 md:text-right">
                            <div class="bg-white p-6 rounded-xl shadow-lg">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ __('pages.services.steps.handover.title') }}</h3>
                                <p class="text-gray-600">{{ __('pages.services.steps.handover.description') }}</p>
                            </div>
                        </div>
                        <div class="absolute left-4 md:left-1/2 transform -translate-x-1/2 w-12 h-12 bg-amber-500 rounded-full flex items-center justify-center text-white font-bold z-10">
                            4
                        </div>
                        <div class="hidden md:block w-5/12"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 md:py-24 lg:py-32 bg-amber-500">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-serif font-bold text-white mb-4">
                {{ __('pages.services.cta_title') }}
            </h2>
            <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto">
                {{ __('pages.services.cta_subtitle') }}
            </p>
            <a href="https://wa.me/{{ str_replace('+', '', \App\Models\Setting::get('whatsapp_number', '6285177907912')) }}?text={{ urlencode(app()->getLocale() === 'en' ? 'Hi, I\'m ready to start my interior design project' : 'Halo, saya siap memulai proyek desain interior saya') }}" 
               target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center px-8 py-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition duration-300 transform hover:-translate-y-1">
                {{ app()->getLocale() === 'en' ? 'Start on WhatsApp' : 'Mulai di WhatsApp' }}
                <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.272-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-9.746 9.776c0 2.716.738 5.355 2.122 7.651L2.601 22.3l8.147-2.138c2.226 1.214 4.72 1.856 7.266 1.856 9.576 0 17.363-7.75 17.363-17.3 0-4.625-1.777-8.966-5.01-12.216-3.23-3.25-7.547-5.084-12.117-5.084 0 0 .032 0 .031 0z"/>
                </svg>
            </a>
        </div>
    </section>
@endsection
