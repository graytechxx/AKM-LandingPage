<nav class="bg-white/60 backdrop-blur-md border-b border-white/20 sticky top-0 z-50 shadow-sm shadow-black/5">
    <div class="max-w-6xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8">
        <div class="flex justify-between items-center h-12 md:h-14">
            <!-- Logo -->
            <a href="{{ route('landing') }}" class="flex items-center gap-2 md:gap-2.5 group flex-shrink-0">
                <img src="{{ asset('images/Logo.png') }}" alt="AKM Interior Design Logo" class="w-auto h-8 md:h-9">
                <span class="hidden sm:inline text-gray-800 font-medium tracking-tight text-sm md:text-base">{{ __('Interior Design') }}</span>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center gap-6 lg:gap-8">
                <a href="{{ route('landing') }}" class="nav-link text-xs lg:text-sm {{ request()->routeIs('landing') ? 'active' : '' }}">{{ __('Home') }}</a>
                <a href="{{ route('gallery') }}" class="nav-link text-xs lg:text-sm {{ request()->routeIs('gallery') ? 'active' : '' }}">{{ __('Gallery') }}</a>
                <a href="{{ route('services') }}" class="nav-link text-xs lg:text-sm {{ request()->routeIs('services') ? 'active' : '' }}">{{ __('Services') }}</a>
                <a href="{{ route('pricing') }}" class="nav-link text-xs lg:text-sm {{ request()->routeIs('pricing') ? 'active' : '' }}">{{ __('Pricing') }}</a>
            </div>

            <!-- Right: Language + CTA -->
            <div class="hidden md:flex items-center gap-3 lg:gap-5">
                @include('partials.language-switcher')
                <a href="{{ route('quote.create') }}" class="text-xs lg:text-sm font-medium text-gray-700 hover:text-amber-600 transition-colors duration-200 inline-flex items-center gap-1">
                    {{ __('Get Quote') }}
                    <svg class="w-3 lg:w-4 h-3 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <!-- Mobile: CTA + Menu -->
            <div class="flex items-center gap-1 md:hidden">
                <a href="{{ route('quote.create') }}" class="text-xs font-medium text-gray-700 px-2 py-1.5 hover:text-amber-600 transition-colors">{{ __('Quote') }}</a>
                <button id="mobile-menu-btn" type="button" class="p-2 text-gray-500 hover:text-gray-800 rounded-lg transition-colors" aria-label="Menu">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-white/20 bg-white/80 backdrop-blur-md">
        <div class="px-3 sm:px-4 py-3 space-y-0.5">
            <a href="{{ route('landing') }}" class="block py-2 text-xs sm:text-sm font-medium {{ request()->routeIs('landing') ? 'text-gray-900' : 'text-gray-600' }} hover:text-amber-600">{{ __('Home') }}</a>
            <a href="{{ route('gallery') }}" class="block py-2 text-xs sm:text-sm font-medium {{ request()->routeIs('gallery') ? 'text-gray-900' : 'text-gray-600' }} hover:text-amber-600">{{ __('Gallery') }}</a>
            <a href="{{ route('services') }}" class="block py-2 text-xs sm:text-sm font-medium {{ request()->routeIs('services') ? 'text-gray-900' : 'text-gray-600' }} hover:text-amber-600">{{ __('Services') }}</a>
            <a href="{{ route('pricing') }}" class="block py-2 text-xs sm:text-sm font-medium {{ request()->routeIs('pricing') ? 'text-gray-900' : 'text-gray-600' }} hover:text-amber-600">{{ __('Pricing') }}</a>
            <div class="pt-2 mt-2 border-t border-gray-100">
                @include('partials.language-switcher')
            </div>
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
