@extends('layouts.app')

@section('title', $portfolio->meta_title ?? $portfolio->title)
@section('meta')
    <meta name="description" content="{{ $portfolio->meta_description ?? Str::limit($portfolio->description, 160) }}">
    <meta name="keywords" content="{{ $portfolio->meta_keywords ?? 'interior design, ' . $portfolio->category }}">
    
    <!-- Open Graph -->
    <meta property="og:title" content="{{ $portfolio->meta_title ?? $portfolio->title }}">
    <meta property="og:description" content="{{ Str::limit($portfolio->description, 200) }}">
    @if($portfolio->featured_image)
        <meta property="og:image" content="{{ asset('storage/' . $portfolio->featured_image) }}">
    @endif
    <meta property="og:type" content="article">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $portfolio->meta_title ?? $portfolio->title }}">
    <meta name="twitter:description" content="{{ Str::limit($portfolio->description, 200) }}">
    @if($portfolio->featured_image)
        <meta name="twitter:image" content="{{ asset('storage/' . $portfolio->featured_image) }}">
    @endif
@endsection

@section('content')
    <!-- Breadcrumb -->
    <section class="bg-gray-100 py-3 md:py-4">
        <div class="container mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
            <nav class="flex items-center text-xs md:text-sm text-gray-600 overflow-x-auto">
                <a href="{{ route('landing', app()->getLocale()) }}" class="hover:text-amber-500 transition whitespace-nowrap">
                    {{ __('pages.breadcrumb.home') }}
                </a>
                <svg class="w-3 md:w-4 h-3 md:h-4 mx-1 md:mx-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="{{ route('gallery', app()->getLocale()) }}" class="hover:text-amber-500 transition whitespace-nowrap">
                    {{ __('pages.breadcrumb.gallery') }}
                </a>
                <svg class="w-3 md:w-4 h-3 md:h-4 mx-1 md:mx-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-900 font-medium whitespace-nowrap line-clamp-1">{{ $portfolio->title }}</span>
            </nav>
        </div>
    </section>

    <!-- Hero Image -->
    <section class="relative h-[60vh] min-h-[500px]">
        @if($portfolio->featured_image)
            <img src="{{ asset('storage/' . $portfolio->featured_image) }}" 
                 alt="{{ $portfolio->title }}"
                 class="w-full h-full object-cover">
        @else
            <div class="w-full h-full bg-gradient-to-br from-amber-100 to-amber-50 flex items-center justify-center">
                <span class="text-gray-400">{{ __('No featured image available') }}</span>
            </div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/40 to-transparent"></div>
        
        <div class="absolute bottom-0 left-0 right-0 p-8">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <span class="inline-block px-4 py-2 bg-amber-500 text-white text-sm font-semibold rounded-full mb-4">
                    {{ __('pages.portfolio.categories.' . $portfolio->category) }}
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-white mb-4">
                    {{ $portfolio->title }}
                </h1>
                <p class="text-xl text-gray-200 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    {{ $portfolio->location }}
                </p>
            </div>
        </div>
    </section>

    <!-- Project Details -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Gallery Slider -->
                    @if($portfolio->gallery_images && count($portfolio->gallery_images) > 0)
                        <div class="mb-12">
                            <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('pages.portfolio.gallery_title') }}</h2>
                            <div class="relative rounded-xl overflow-hidden">
                                <div id="gallery-slider" class="flex overflow-x-auto snap-x snap-mandatory scroll-smooth scrollbar-hide">
                                    @foreach($portfolio->gallery_images as $image)
                                        @php $galleryImage = asset('storage/' . $image); @endphp
                                        <div class="snap-center flex-shrink-0 w-full md:w-[80%] lg:w-full mr-4">
                                            <img src="{{ $galleryImage }}" 
                                                 alt="{{ $portfolio->title }} - {{ $loop->iteration }}"
                                                 class="w-full h-[400px] object-cover rounded-xl cursor-pointer"
                                                 onclick="openLightbox('{{ $galleryImage }}')">
                                        </div>
                                    @endforeach
                                </div>
                                
                                <!-- Navigation Arrows -->
                                @if(count($portfolio->gallery_images) > 1)
                                    <button onclick="scrollGallery(-1)" 
                                            class="absolute left-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-lg transition">
                                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                        </svg>
                                    </button>
                                    <button onclick="scrollGallery(1)" 
                                            class="absolute right-4 top-1/2 transform -translate-y-1/2 w-12 h-12 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-lg transition">
                                        <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </button>
                                @endif
                            </div>
                            
                            <!-- Thumbnails -->
                            @if(count($portfolio->gallery_images) > 1)
                                <div class="flex gap-3 mt-4 overflow-x-auto pb-2">
                                    @foreach($portfolio->gallery_images as $index => $image)
                                        @php
                                            $thumbImage = asset('storage/' . $image);
                                        @endphp
                                        <button type="button"
                                                class="thumb-btn flex-shrink-0 w-20 h-20 rounded-lg overflow-hidden border-2 border-transparent hover:border-amber-500 transition"
                                                data-slide-index="{{ $index }}">
                                            <img src="{{ $thumbImage }}" 
                                                 alt="Thumbnail {{ $index + 1 }}"
                                                 class="w-full h-full object-cover">
                                        </button>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endif
                    
                    <!-- Description -->
                    <div class="prose prose-lg max-w-none">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('pages.portfolio.about_project') }}</h2>
                        <div class="text-gray-600 leading-relaxed">
                            {!! nl2br(e($portfolio->description)) !!}
                        </div>
                    </div>
                    
                    <!-- Project Details List -->
                    <div class="mt-12">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('pages.portfolio.details_title') }}</h2>
                        <div class="grid md:grid-cols-2 gap-6">
                            @if($portfolio->client_name)
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                        <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">{{ __('pages.portfolio.client') }}</p>
                                        <p class="font-semibold text-gray-900">{{ $portfolio->client_name }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            @if($portfolio->area)
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                        <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">{{ __('pages.portfolio.area') }}</p>
                                        <p class="font-semibold text-gray-900">{{ $portfolio->area }} m²</p>
                                    </div>
                                </div>
                            @endif
                            
                            @if($portfolio->duration)
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                        <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">{{ __('pages.portfolio.duration') }}</p>
                                        <p class="font-semibold text-gray-900">{{ $portfolio->duration }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            @if($portfolio->year)
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                        <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">{{ __('pages.portfolio.year') }}</p>
                                        <p class="font-semibold text-gray-900">{{ $portfolio->year }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-gray-50 rounded-2xl p-6 sticky top-24">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">{{ __('pages.portfolio.interested') }}</h3>
                        <p class="text-gray-600 mb-6">
                            {{ __('pages.portfolio.interested_text') }}
                        </p>
                        <a href="https://wa.me/{{ str_replace('+', '', \App\Models\Setting::get('whatsapp_number', '6285177907912')) }}?text={{ urlencode(app()->getLocale() === 'en' ? 'Hi, I\'m interested in a similar design for my project' : 'Halo, saya tertarik dengan desain serupa untuk proyek saya') }}" 
                           target="_blank" rel="noopener noreferrer"
                           class="block w-full py-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg text-center transition duration-300 mb-4">
                            {{ app()->getLocale() === 'en' ? 'Chat on WhatsApp' : 'Chat di WhatsApp' }}
                        </a>
                        <a href="{{ route('gallery', app()->getLocale()) }}" 
                           class="block w-full py-4 border-2 border-gray-900 text-gray-900 hover:bg-gray-900 hover:text-white font-semibold rounded-lg text-center transition duration-300">
                            {{ __('messages.buttons.view_all_projects') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Portfolios -->
    @if($relatedPortfolios && $relatedPortfolios->count() > 0)
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-serif font-bold text-gray-900 mb-12 text-center">
                    {{ __('pages.portfolio.related_title') }}
                </h2>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($relatedPortfolios as $related)
                        <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">
                            <div class="relative overflow-hidden aspect-[4/3]">
                                <img src="{{ asset('storage/' . $related->featured_image) }}" 
                                     alt="{{ $related->title }}"
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 bg-white/90 text-amber-600 text-xs font-semibold rounded-full">
                                        {{ __('pages.portfolio.categories.' . $related->category) }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                @php $relatedUrl = route('portfolio.show.' . app()->getLocale(), ['id' => $related->id]); @endphp
                                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-amber-600 transition">
                                    <a href="{{ $relatedUrl }}">
                                        {{ $related->title }}
                                    </a>
                                </h3>
                                <p class="text-gray-500 text-sm flex items-center mb-4">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ $related->location }}
                                </p>
                                <a href="{{ $relatedUrl }}" 
                                   class="inline-flex items-center text-amber-500 font-semibold hover:text-amber-600 transition">
                                    {{ __('messages.buttons.view_details') }}
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    
    <!-- Lightbox -->
    <div id="lightbox" class="fixed inset-0 z-50 hidden bg-gray-900/95 flex items-center justify-center p-4">
        <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white hover:text-amber-500 transition">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <img id="lightbox-img" src="" alt="Gallery Image" class="max-w-full max-h-[90vh] object-contain rounded-lg">
    </div>
@endsection

@section('scripts')
<script>
    let currentSlide = 0;
    const slider = document.getElementById('gallery-slider');
    
    function scrollGallery(direction) {
        if (!slider) return;
        const slideWidth = slider.children[0].offsetWidth + 16; // width + margin
        currentSlide += direction;
        currentSlide = Math.max(0, Math.min(currentSlide, slider.children.length - 1));
        slider.scrollTo({
            left: currentSlide * slideWidth,
            behavior: 'smooth'
        });
    }
    
    function goToSlide(index) {
        currentSlide = index;
        scrollGallery(0);
    }
    
    function openLightbox(src) {
        document.getElementById('lightbox-img').src = src;
        document.getElementById('lightbox').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    
    function closeLightbox() {
        document.getElementById('lightbox').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
    
    // Close lightbox on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeLightbox();
    });
    
    // Close lightbox on click outside
    document.getElementById('lightbox').addEventListener('click', function(e) {
        if (e.target === this) closeLightbox();
    });
    
    // Thumbnail button click handlers
    document.querySelectorAll('.thumb-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var index = parseInt(this.getAttribute('data-slide-index'));
            goToSlide(index);
        });
    });
</script>
@endsection
