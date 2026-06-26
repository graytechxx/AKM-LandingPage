@extends('layouts.app')

@section('title', __('meta.home.title'))
@section('meta')
    <meta name="description" content="{{ __('meta.home.description') }}">
    <meta name="keywords" content="{{ __('meta.home.keywords') }}">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-screen md:h-screen flex items-center justify-center overflow-hidden pt-14">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero-bg.jpg') }}" alt="AKM Interior Design" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900/90 via-gray-900/70 to-gray-900/50"></div>
        </div>
        
        <!-- Hero Content -->
        <div class="relative z-10 w-full px-4 sm:px-6 lg:px-8 py-12 md:py-0">
            <div class="max-w-4xl mx-auto md:mx-0">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-serif font-bold text-white mb-4 md:mb-6 leading-tight animate-fade-in">
                    {{ __('pages.home.hero_title') }}
                </h1>
                <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-200 mb-6 md:mb-8 leading-relaxed max-w-2xl">
                    {{ __('pages.home.hero_subtitle') }}
                </p>
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center md:justify-start">
                    <a href="{{ route('gallery.' . app()->getLocale()) }}" 
                       class="inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-amber-500 hover:bg-amber-600 text-white text-sm sm:text-base font-semibold rounded-lg transition duration-300 transform hover:-translate-y-1">
                        {{ __('messages.buttons.view_portfolio') }}
                        <svg class="w-4 sm:w-5 h-4 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <a href="https://wa.me/{{ str_replace('+', '', \App\Models\Setting::get('whatsapp_number', '6285177907912')) }}?text={{ urlencode(app()->getLocale() === 'en' ? 'Hi, I\'m interested in getting a quote for my interior design project.' : 'Halo, saya tertarik mendapatkan penawaran untuk proyek desain interior saya.') }}" 
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 border-2 border-white text-white text-sm sm:text-base font-semibold rounded-lg hover:bg-white hover:text-green-600 transition duration-300">
                        {{ app()->getLocale() === 'en' ? 'Chat on WhatsApp' : 'Chat di WhatsApp' }}
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-6 md:bottom-8 left-1/2 transform -translate-x-1/2 z-10 animate-bounce hidden md:block">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 md:py-24 lg:py-32 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8 md:gap-12 items-center">
                <div class="relative order-2 md:order-1">
                    <img src="{{ asset('images/about-ipm.jpg') }}" alt="AKM Interior Design Team" 
                         class="rounded-2xl shadow-2xl w-full">
                    <div class="absolute -bottom-4 md:-bottom-6 -right-4 md:-right-6 bg-amber-500 text-white p-4 md:p-6 rounded-xl shadow-lg">
                        <p class="text-2xl md:text-3xl font-bold">10+</p>
                        <p class="text-xs md:text-sm">{{ __('pages.home.about_experience') }}</p>
                    </div>
                </div>
                <div class="order-1 md:order-2">
                    <span class="text-amber-500 font-semibold text-xs sm:text-sm uppercase tracking-wider">
                        {{ __('pages.home.about_subtitle') }}
                    </span>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-gray-900 mt-2 mb-4 md:mb-6">
                        {{ __('pages.home.about_title') }}
                    </h2>
                    <p class="text-sm sm:text-base text-gray-600 mb-4 md:mb-6 leading-relaxed">
                        {{ __('pages.home.about_text') }}
                    </p>
                    <div class="grid grid-cols-2 gap-6 md:gap-8 mb-8 md:mb-10">
                        <div class="text-center p-3 md:p-4 bg-gray-50 rounded-lg">
                            <p class="text-2xl md:text-3xl font-bold text-amber-500">100+</p>
                            <p class="text-gray-600 text-xs md:text-sm">{{ __('pages.home.stat_projects') }}</p>
                        </div>
                        <div class="text-center p-3 md:p-4 bg-gray-50 rounded-lg">
                            <p class="text-2xl md:text-3xl font-bold text-amber-500">50+</p>
                            <p class="text-gray-600 text-xs md:text-sm">{{ __('pages.home.stat_clients') }}</p>
                        </div>
                    </div>
                    <a href="{{ route('services', app()->getLocale()) }}" 
                       class="inline-flex items-center text-amber-500 text-sm md:text-base font-semibold hover:text-amber-600 transition">
                        {{ __('messages.buttons.learn_more') }}
                        <svg class="w-4 md:w-5 h-4 md:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Portfolio Section - Slider elegan -->
    <section class="py-16 md:py-24 lg:py-32 bg-gradient-to-b from-gray-50 to-white overflow-hidden relative">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-amber-50/30 via-transparent to-transparent pointer-events-none"></div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center mb-8 md:mb-16">
                <span class="inline-block text-amber-600 font-medium text-xs uppercase tracking-[0.3em] mb-2 md:mb-3">
                    {{ __('pages.home.portfolio_subtitle') }}
                </span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-serif font-bold text-gray-900 tracking-tight px-2 mb-4 md:mb-6">
                    {{ __('pages.home.portfolio_title') }}
                </h2>
                <div class="w-20 h-0.5 bg-amber-500 mx-auto mt-4 md:mt-6"></div>
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-2 md:px-0">
            <!-- Tombol navigasi - halus, kurang menonjol -->
            <button type="button" aria-label="{{ __('Previous') }}" id="portfolio-prev" class="hidden md:flex absolute left-2 lg:left-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/50 backdrop-blur-sm shadow-sm items-center justify-center text-gray-400 hover:text-amber-600 hover:bg-white/80 hover:shadow-md transition-all duration-300 focus:outline-none focus:ring-1 focus:ring-amber-400/40">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button type="button" aria-label="{{ __('Next') }}" id="portfolio-next" class="hidden md:flex absolute right-2 lg:right-4 top-1/2 -translate-y-1/2 z-20 w-10 h-10 rounded-full bg-white/50 backdrop-blur-sm shadow-sm items-center justify-center text-gray-400 hover:text-amber-600 hover:bg-white/80 hover:shadow-md transition-all duration-300 focus:outline-none focus:ring-1 focus:ring-amber-400/40">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
            </button>

            <!-- Fade edges -->
            <div class="absolute left-0 top-0 bottom-0 w-8 md:w-16 lg:w-24 bg-gradient-to-r from-gray-50 to-transparent z-10 pointer-events-none"></div>
            <div class="absolute right-0 top-0 bottom-0 w-8 md:w-16 lg:w-24 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none"></div>

            <div id="portfolio-slider" class="flex gap-6 md:gap-8 overflow-x-auto overflow-y-hidden py-4 md:py-8 px-4 md:px-8 lg:px-16 snap-x snap-mandatory scroll-smooth scrollbar-hide" style="-webkit-overflow-scrolling: touch;">
                @forelse($featuredPortfolios as $portfolio)
                    <div class="group relative flex-shrink-0 w-[calc(100vw-2rem)] sm:w-[280px] md:w-[360px] lg:w-[420px] snap-center cursor-pointer"
                         onclick="window.location='{{ route('portfolio.show.' . app()->getLocale(), ['id' => $portfolio->id]) }}'">
                        <div class="relative overflow-hidden rounded-2xl bg-white shadow-lg shadow-gray-200/50 ring-1 ring-gray-100 transition-all duration-500 group-hover:shadow-2xl group-hover:shadow-amber-900/10 group-hover:ring-amber-200 group-hover:-translate-y-1">
                            <div class="aspect-[4/5] overflow-hidden">
                                <img src="{{ asset('storage/' . $portfolio->featured_image) }}" 
                                     alt="{{ $portfolio->title }}"
                                     class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
                                <!-- Overlay gradient (selalu terlihat halus di bawah) -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/0 to-black/0"></div>
                                <!-- Overlay hover -->
                                <div class="absolute inset-0 bg-gradient-to-t from-amber-900/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-400"></div>
                            </div>
                            <!-- Caption - selalu terlihat, elegan -->
                            <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6 pt-12 md:pt-16 text-white">
                                <p class="text-amber-300/90 text-xs font-semibold uppercase tracking-[0.2em] mb-1 md:mb-2">
                                    {{ __('pages.portfolio.categories.' . $portfolio->category) }}
                                </p>
                                <h3 class="text-lg md:text-xl font-semibold tracking-tight drop-shadow-sm line-clamp-1">{{ $portfolio->title }}</h3>
                                <p class="text-white/80 text-xs md:text-sm mt-1 font-light line-clamp-1">{{ $portfolio->location }}</p>
                                <span class="inline-flex items-center mt-3 md:mt-4 text-amber-300 text-xs md:text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    {{ __('messages.buttons.view_details') }}
                                    <svg class="w-3 md:w-4 h-3 md:h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex-shrink-0 w-full flex justify-center py-16">
                        <p class="text-gray-400">{{ __('messages.portfolio.no_items') }}</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 mt-8 md:mt-14 text-center">
            <a href="{{ route('gallery', app()->getLocale()) }}" 
               class="inline-flex items-center px-6 md:px-8 py-3 md:py-4 bg-gray-900 hover:bg-gray-800 text-white text-xs md:text-sm font-medium tracking-wide rounded-full transition-all duration-300 hover:shadow-lg hover:shadow-gray-900/20">
                {{ __('messages.buttons.view_all_projects') }}
                <svg class="w-3 md:w-4 h-3 md:h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </section>

    <style>
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    @push('scripts')
    <script>
        (function() {
            var slider = document.getElementById('portfolio-slider');
            var prev = document.getElementById('portfolio-prev');
            var next = document.getElementById('portfolio-next');
            if (!slider || !prev || !next) return;
            function getScrollAmount() {
                var card = slider.querySelector('[class*="snap-center"]');
                if (card) {
                    var style = getComputedStyle(card);
                    var width = card.offsetWidth;
                    var gap = 32;
                    return width + gap;
                }
                return 448;
            }
            prev.addEventListener('click', function() {
                slider.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
            });
            next.addEventListener('click', function() {
                slider.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
            });
        })();
    </script>
    @endpush

    <!-- Services Section -->
    <section class="py-12 md:py-20 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 md:mb-16">
                <span class="text-amber-500 font-semibold text-xs sm:text-sm uppercase tracking-wider">
                    {{ __('pages.home.services_subtitle') }}
                </span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-gray-900 mt-2 px-2">
                    {{ __('pages.home.services_title') }}
                </h2>
            </div>
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
                <!-- Service 1: Consultation -->
                <div class="group p-6 md:p-8 bg-gray-50 rounded-2xl hover:bg-amber-500 hover:shadow-xl transition duration-300">
                    <div class="w-12 md:w-16 h-12 md:h-16 bg-amber-500 group-hover:bg-white rounded-xl flex items-center justify-center mb-4 md:mb-6 transition duration-300">
                        <svg class="w-6 md:w-8 h-6 md:h-8 text-white group-hover:text-amber-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 group-hover:text-white mb-2 md:mb-3">
                        {{ app()->getLocale() === 'en' ? 'Design Consultation' : 'Konsultasi Desain' }}
                    </h3>
                    <p class="text-sm md:text-base text-gray-600 group-hover:text-gray-100 mb-3 md:mb-4">
                        {{ app()->getLocale() === 'en' ? 'Professional consultation to plan your interior design. Get expert advice on space planning, color selection, and material choices.' : 'Konsultasi profesional untuk merencanakan desain interior Anda. Dapatkan saran ahli tentang perencanaan ruang, pemilihan warna, dan pilihan material.' }}
                    </p>
                    <a href="https://wa.me/{{ str_replace('+', '', \App\Models\Setting::get('whatsapp_number', '6285177907912')) }}?text={{ urlencode(app()->getLocale() === 'en' ? 'Hi, I\'m interested in design consultation' : 'Halo, saya tertarik konsultasi desain interior') }}" 
                       target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm md:text-base font-semibold rounded transition duration-300">
                        {{ app()->getLocale() === 'en' ? 'Chat on WhatsApp' : 'Chat di WhatsApp' }}
                        <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.272-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-9.746 9.776c0 2.716.738 5.355 2.122 7.651L2.601 22.3l8.147-2.138c2.226 1.214 4.72 1.856 7.266 1.856 9.576 0 17.363-7.75 17.363-17.3 0-4.625-1.777-8.966-5.01-12.216-3.23-3.25-7.547-5.084-12.117-5.084 0 0 .032 0 .031 0z"/>
                        </svg>
                    </a>
                </div>

                <!-- Service 2: Interior Renovation -->
                <div class="group p-6 md:p-8 bg-gray-50 rounded-2xl hover:bg-amber-500 hover:shadow-xl transition duration-300">
                    <div class="w-12 md:w-16 h-12 md:h-16 bg-amber-500 group-hover:bg-white rounded-xl flex items-center justify-center mb-4 md:mb-6 transition duration-300">
                        <svg class="w-6 md:w-8 h-6 md:h-8 text-white group-hover:text-amber-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 group-hover:text-white mb-2 md:mb-3">
                        {{ app()->getLocale() === 'en' ? 'Interior Renovation' : 'Renovasi Interior' }}
                    </h3>
                    <p class="text-sm md:text-base text-gray-600 group-hover:text-gray-100 mb-3 md:mb-4">
                        {{ app()->getLocale() === 'en' ? 'Complete renovation service from design to execution. We handle all aspects of your interior renovation project with quality and precision.' : 'Layanan renovasi lengkap dari desain hingga eksekusi. Kami menangani semua aspek proyek renovasi interior Anda dengan kualitas dan presisi.' }}
                    </p>
                    <a href="{{ route('services.' . app()->getLocale()) }}" 
                       class="inline-flex items-center text-amber-500 group-hover:text-white text-sm md:text-base font-semibold">
                        {{ __('messages.buttons.learn_more') }}
                        <svg class="w-3 md:w-4 h-3 md:h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Service 3: Custom Furniture -->
                <div class="group p-6 md:p-8 bg-gray-50 rounded-2xl hover:bg-amber-500 hover:shadow-xl transition duration-300">
                    <div class="w-12 md:w-16 h-12 md:h-16 bg-amber-500 group-hover:bg-white rounded-xl flex items-center justify-center mb-4 md:mb-6 transition duration-300">
                        <svg class="w-6 md:w-8 h-6 md:h-8 text-white group-hover:text-amber-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 group-hover:text-white mb-2 md:mb-3">
                        {{ app()->getLocale() === 'en' ? 'Custom Furniture' : 'Furniture Custom' }}
                    </h3>
                    <p class="text-sm md:text-base text-gray-600 group-hover:text-gray-100 mb-3 md:mb-4">
                        {{ app()->getLocale() === 'en' ? 'Bespoke furniture design and manufacturing tailored to your needs. Create unique pieces that perfectly fit your space and style.' : 'Desain dan pembuatan furniture eksklusif yang disesuaikan dengan kebutuhan Anda. Ciptakan pieces unik yang sempurna untuk ruang dan gaya Anda.' }}
                    </p>
                    <a href="{{ route('services.' . app()->getLocale()) }}" 
                       class="inline-flex items-center text-amber-500 group-hover:text-white text-sm md:text-base font-semibold">
                        {{ __('messages.buttons.learn_more') }}
                        <svg class="w-3 md:w-4 h-3 md:h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="py-16 md:py-24 bg-gradient-to-b from-gray-900 to-gray-800 text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-12 md:mb-20">
                <span class="text-amber-500 font-semibold text-xs sm:text-sm uppercase tracking-widest">
                    {{ app()->getLocale() === 'en' ? 'Transparent Pricing' : 'Harga Transparan' }}
                </span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-serif font-bold mt-4 mb-4 px-2">
                    {{ app()->getLocale() === 'en' ? 'Starting from Rp 2,000,000/m²' : 'Mulai dari Rp 2.000.000/m²' }}
                </h2>
                <p class="text-gray-400 text-base md:text-lg max-w-2xl mx-auto">
                    {{ app()->getLocale() === 'en' ? 'Affordable, high-quality interior design without hidden costs. Customizable packages for every budget.' : 'Desain interior berkualitas dengan harga terjangkau. Paket yang dapat disesuaikan dengan kebutuhan Anda.' }}
                </p>
            </div>

            <!-- Main Pricing Card -->
            <div class="max-w-3xl mx-auto mb-12 md:mb-20">
                <div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-3xl p-8 md:p-12 shadow-2xl">
                    <div class="grid md:grid-cols-2 gap-8 md:gap-12 items-center">
                        <div>
                            <h3 class="text-2xl md:text-3xl font-bold text-white mb-6">{{ app()->getLocale() === 'en' ? 'What\'s Included' : 'Apa Yang Termasuk' }}</h3>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-white mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-white text-sm md:text-base">{{ app()->getLocale() === 'en' ? 'Complete site survey & consultation' : 'Survey lokasi & konsultasi lengkap' }}</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-white mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-white text-sm md:text-base">{{ app()->getLocale() === 'en' ? 'Professional design concept & drawings' : 'Konsep desain & gambar teknis profesional' }}</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-white mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-white text-sm md:text-base">{{ app()->getLocale() === 'en' ? 'Material & color recommendations' : 'Rekomendasi material & warna' }}</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-white mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0 4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="text-white text-sm md:text-base">{{ app()->getLocale() === 'en' ? 'Design revisions included' : 'Revisi desain tersedia' }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="text-center">
                            <div class="mb-6">
                                <p class="text-white/80 text-sm md:text-base mb-2">{{ app()->getLocale() === 'en' ? 'Starting Price' : 'Harga Mulai' }}</p>
                                <div class="text-5xl md:text-6xl font-bold text-white mb-2">
                                    Rp 2.000.000
                                </div>
                                <p class="text-white/90 font-semibold">{{ app()->getLocale() === 'en' ? 'per m²' : 'per m²' }}</p>
                            </div>
                            <p class="text-white/70 text-xs md:text-sm mb-6">
                                {{ app()->getLocale() === 'en' ? 'Based on project scope & requirements' : 'Berdasarkan ruang lingkup & kebutuhan proyek' }}
                            </p>
                            <a href="https://wa.me/{{ str_replace('+', '', \App\Models\Setting::get('whatsapp_number', '6285177907912')) }}?text={{ urlencode(app()->getLocale() === 'en' ? 'Hi, I\'m interested in getting a quote for my interior design project.' : 'Halo, saya tertarik mendapatkan penawaran untuk proyek desain interior saya.') }}" 
                               target="_blank" rel="noopener noreferrer"
                               class="inline-block bg-green-600 hover:bg-green-700 text-white px-8 py-3 md:py-4 rounded-lg font-bold text-sm md:text-base transition duration-300 transform hover:-translate-y-1">
                                {{ app()->getLocale() === 'en' ? 'Get Free Quote on WhatsApp' : 'Dapatkan Penawaran Gratis via WhatsApp' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="text-center mt-12 md:mt-16">
                <p class="text-gray-400 mb-4">{{ app()->getLocale() === 'en' ? 'More options available' : 'Lebih banyak pilihan tersedia' }}</p>
                <a href="{{ route('pricing.' . app()->getLocale()) }}" 
                   class="inline-flex items-center text-amber-400 hover:text-amber-300 font-semibold transition">
                    {{ app()->getLocale() === 'en' ? 'View All Pricing Details' : 'Lihat Semua Detail Harga' }}
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-12 md:py-20 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 md:mb-16">
                <span class="text-amber-500 font-semibold text-xs sm:text-sm uppercase tracking-wider">
                    {{ __('pages.home.testimonials_subtitle') }}
                </span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-gray-900 mt-2 px-2">
                    {{ __('pages.home.testimonials_title') }}
                </h2>
            </div>
            
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
                @forelse($activeTestimonials as $testimonial)
                    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg">
                        <div class="flex items-center mb-3 md:mb-4">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 md:w-5 h-4 md:h-5 {{ $i <= $testimonial->rating ? 'text-amber-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                        <p class="text-gray-600 mb-4 md:mb-6 italic text-sm md:text-base line-clamp-4">"{{ $testimonial->content }}"</p>
                        <div class="flex items-center">
                            <div class="w-10 md:w-12 h-10 md:h-12 rounded-full bg-amber-100 flex items-center justify-center mr-3 md:mr-4 flex-shrink-0">
                                <svg class="w-5 md:w-6 h-5 md:h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <p class="font-bold text-gray-900 text-sm md:text-base truncate">{{ $testimonial->client_name }}</p>
                                <p class="text-xs md:text-sm text-gray-500 truncate">{{ $testimonial->project_name }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500">{{ __('messages.testimonials.no_items') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-12 md:py-20 bg-amber-500">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-serif font-bold text-white mb-3 md:mb-4 px-2">
                {{ __('pages.home.cta_title') }}
            </h2>
            <p class="text-white/90 text-sm sm:text-base md:text-lg mb-6 md:mb-8 max-w-2xl mx-auto px-2">
                {{ __('pages.home.cta_subtitle') }}
            </p>
            <a href="https://wa.me/{{ str_replace('+', '', \App\Models\Setting::get('whatsapp_number', '6285177907912')) }}?text={{ urlencode(app()->getLocale() === 'en' ? 'Hi, I\'m interested in getting a quote for my interior design project.' : 'Halo, saya tertarik mendapatkan penawaran untuk proyek desain interior saya.') }}" 
               target="_blank" rel="noopener noreferrer"
               class="inline-flex items-center px-6 md:px-8 py-3 md:py-4 bg-green-600 hover:bg-green-700 text-white text-sm md:text-base font-semibold rounded-lg transition duration-300">
                {{ app()->getLocale() === 'en' ? 'Get Free Consultation' : 'Dapatkan Konsultasi Gratis' }}
                <svg class="w-4 md:w-5 h-4 md:h-5 ml-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.272-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-9.746 9.776c0 2.716.738 5.355 2.122 7.651L2.601 22.3l8.147-2.138c2.226 1.214 4.72 1.856 7.266 1.856 9.576 0 17.363-7.75 17.363-17.3 0-4.625-1.777-8.966-5.01-12.216-3.23-3.25-7.547-5.084-12.117-5.084 0 0 .032 0 .031 0z"/>
                </svg>
            </a>
        </div>
    </section>
@endsection
