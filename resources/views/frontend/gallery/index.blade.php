@extends('layouts.app')

@section('title', __('meta.gallery.title'))
@section('meta')
    <meta name="description" content="{{ __('meta.gallery.description') }}">
    <meta name="keywords" content="{{ __('meta.gallery.keywords') }}">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative py-12 md:py-20 bg-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/gallery-hero.jpg') }}" alt="{{ __('pages.gallery.title') }}" 
                 class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/80 to-gray-900/40"></div>
        </div>
        
        <div class="relative z-10 container mx-auto px-3 sm:px-4 md:px-6 lg:px-8 text-center">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-serif font-bold text-white mb-3 md:mb-6 px-2">
                {{ __('pages.gallery.title') }}
            </h1>
            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-300 max-w-3xl mx-auto mb-6 md:mb-8 px-2">
                {{ __('pages.gallery.subtitle') }}
            </p>
        </div>
    </section>

    <!-- Filter Section -->
    <section class="py-4 md:py-8 bg-white border-b border-gray-200 sticky top-0 z-40 shadow-sm">
        <div class="container mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
            <div class="flex flex-wrap justify-center gap-2 md:gap-3">
                <a href="{{ route('gallery.' . app()->getLocale()) }}" 
                   class="px-3 md:px-6 py-1.5 md:py-2 rounded-full text-xs md:text-sm font-medium transition duration-300 {{ !request('category') ? 'bg-amber-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    {{ __('pages.gallery.filter_all') }}
                </a>
                <a href="{{ route('gallery.' . app()->getLocale(), ['category' => 'living-room']) }}" 
                   class="px-3 md:px-6 py-1.5 md:py-2 rounded-full text-xs md:text-sm font-medium transition duration-300 {{ request('category') == 'living-room' ? 'bg-amber-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    {{ __('pages.gallery.categories.living_room') }}
                </a>
                <a href="{{ route('gallery.' . app()->getLocale(), ['category' => 'bedroom']) }}" 
                   class="px-3 md:px-6 py-1.5 md:py-2 rounded-full text-xs md:text-sm font-medium transition duration-300 {{ request('category') == 'bedroom' ? 'bg-amber-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    {{ __('pages.gallery.categories.bedroom') }}
                </a>
                <a href="{{ route('gallery.' . app()->getLocale(), ['category' => 'kitchen']) }}" 
                   class="px-3 md:px-6 py-1.5 md:py-2 rounded-full text-xs md:text-sm font-medium transition duration-300 {{ request('category') == 'kitchen' ? 'bg-amber-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    {{ __('pages.gallery.categories.kitchen') }}
                </a>
                <a href="{{ route('gallery.' . app()->getLocale(), ['category' => 'office']) }}" 
                   class="px-3 md:px-6 py-1.5 md:py-2 rounded-full text-xs md:text-sm font-medium transition duration-300 {{ request('category') == 'office' ? 'bg-amber-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    {{ __('pages.gallery.categories.office') }}
                </a>
                <a href="{{ route('gallery.' . app()->getLocale(), ['category' => 'commercial']) }}" 
                   class="px-3 md:px-6 py-1.5 md:py-2 rounded-full text-xs md:text-sm font-medium transition duration-300 {{ request('category') == 'commercial' ? 'bg-amber-500 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    {{ __('pages.gallery.categories.commercial') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-8 md:py-16 bg-gray-50">
        <div class="container mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-8">
                @forelse($portfolios as $portfolio)
                    <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">
                        <div class="relative overflow-hidden aspect-[4/3]">
                            <img src="{{ asset('storage/' . $portfolio->featured_image) }}" 
                                 alt="{{ $portfolio->title }}"
                                 class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 via-gray-900/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end justify-between p-3 md:p-6">
                                <span class="text-amber-400 text-xs md:text-sm font-semibold uppercase tracking-wider">
                                    {{ __('pages.portfolio.categories.' . $portfolio->category) }}
                                </span>
                                @php $lightboxImage = asset('storage/' . $portfolio->featured_image); @endphp
                                <button onclick="openLightbox('{{ $lightboxImage }}')"
                                        class="w-8 md:w-10 h-8 md:h-10 bg-white rounded-full flex items-center justify-center hover:bg-amber-500 hover:text-white transition duration-300 flex-shrink-0">
                                    <svg class="w-4 md:w-5 h-4 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="p-3 md:p-6">
                            <h3 class="text-base md:text-lg lg:text-xl font-bold text-gray-900 mb-1 md:mb-2 group-hover:text-amber-600 transition line-clamp-2">
                                @php
                                    $locale = app()->getLocale() ?: config('app.locale', 'id');
                                    $portfolioUrl = route('portfolio.show.' . $locale, ['id' => $portfolio->id]);
                                @endphp
                                <a href="{{ $portfolioUrl }}">
                                    {{ $portfolio->title }}
                                </a>
                            </h3>
                            <p class="text-gray-500 text-xs md:text-sm flex items-center mb-3 md:mb-4 line-clamp-1">
                                <svg class="w-3 md:w-4 h-3 md:h-4 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $portfolio->location }}
                            </p>
                            <a href="{{ $portfolioUrl }}" 
                               class="inline-flex items-center text-amber-500 font-semibold hover:text-amber-600 transition">
                                {{ __('messages.buttons.view_details') }}
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-500 text-lg mb-2">{{ __('messages.gallery.no_items') }}</p>
                        <p class="text-gray-400 text-sm">{{ __('messages.gallery.try_different_filter') }}</p>
                    </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            @if($portfolios->hasPages())
                <div class="mt-12">
                    {{ $portfolios->links() }}
                </div>
            @endif
            
            <!-- Load More Button (if using pagination) -->
            @if($portfolios->hasMorePages())
                <div class="text-center mt-8">
                    <button onclick="loadMore()" 
                            class="inline-flex items-center px-8 py-4 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-lg transition duration-300">
                        {{ __('messages.buttons.load_more') }}
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
            @endif
        </div>
    </section>
    
    <!-- Lightbox Modal -->
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
</script>
@endsection
