<aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-gray-900 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <!-- Logo -->
    <div class="flex items-center justify-center h-16 bg-gray-800 border-b border-gray-700">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-indigo-600 rounded flex items-center justify-center">
                <span class="text-white font-bold">IPM</span>
            </div>
            <span class="text-lg font-semibold">{{ __('admin.Admin Panel') }}</span>
        </a>
    </div>
    
    <!-- Navigation -->
    <nav class="mt-5 px-2 space-y-1 overflow-y-auto h-[calc(100vh-4rem)]">
        <!-- Dashboard -->
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition-colors">
            <i class="fas fa-tachometer-alt w-6 text-center mr-3"></i>
            {{ __('admin.Dashboard') }}
        </a>
        
        <div class="pt-4 pb-2">
            <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                {{ __('admin.Content Management') }}
            </p>
        </div>
        
        <!-- Portfolios -->
        <a href="{{ route('admin.portfolios.index') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('admin.portfolios.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition-colors">
            <i class="fas fa-images w-6 text-center mr-3"></i>
            {{ __('admin.Portfolios') }}
        </a>
        
        <!-- Services -->
        <a href="{{ route('admin.services.index') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('admin.services.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition-colors">
            <i class="fas fa-briefcase w-6 text-center mr-3"></i>
            {{ __('admin.Services') }}
        </a>
        
        <!-- Pricing -->
        <a href="{{ route('admin.pricing.index') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('admin.pricing.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition-colors">
            <i class="fas fa-tags w-6 text-center mr-3"></i>
            {{ __('Pricing') }}
        </a>
        
        <!-- Testimonials -->
        <a href="{{ route('admin.testimonials.index') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('admin.testimonials.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition-colors">
            <i class="fas fa-star w-6 text-center mr-3"></i>
            {{ __('admin.Testimonials') }}
        </a>
        
        <div class="pt-4 pb-2">
            <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                {{ __('admin.Communications') }}
            </p>
        </div>
        
        <!-- Quote Requests -->
        <a href="{{ route('admin.quotes.index') }}" 
           class="flex items-center justify-between px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('admin.quotes.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition-colors">
            <div class="flex items-center">
                <i class="fas fa-file-invoice-dollar w-6 text-center mr-3"></i>
                {{ __('admin.Quote Requests') }}
            </div>
            @if(isset($pendingQuotes) && $pendingQuotes > 0)
                <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                    {{ $pendingQuotes }}
                </span>
            @endif
        </a>
        
        <!-- Contact Messages -->
        <a href="{{ route('admin.contacts.index') }}" 
           class="flex items-center justify-between px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('admin.contacts.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition-colors">
            <div class="flex items-center">
                <i class="fas fa-envelope w-6 text-center mr-3"></i>
                {{ __('admin.Contact Messages') }}
            </div>
            @if(isset($unreadMessages) && $unreadMessages > 0)
                <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                    {{ $unreadMessages }}
                </span>
            @endif
        </a>
        
        <div class="pt-4 pb-2">
            <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">
                {{ __('admin.System') }}
            </p>
        </div>
        
        <!-- Settings -->
        <a href="{{ route('admin.settings.index') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('admin.settings.*') ? 'bg-indigo-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} transition-colors">
            <i class="fas fa-cog w-6 text-center mr-3"></i>
            {{ __('admin.Settings') }}
        </a>
        
        <!-- Divider -->
        <div class="my-4 border-t border-gray-700"></div>
        
        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="px-2">
            @csrf
            <button type="submit" 
                    class="w-full flex items-center px-4 py-3 text-sm font-medium text-red-400 hover:bg-red-900 hover:text-red-200 rounded-lg transition-colors">
                <i class="fas fa-sign-out-alt w-6 text-center mr-3"></i>
                {{ __('admin.Logout') }}
            </button>
        </form>
    </nav>
    
    <!-- Mobile Close Button -->
    <button id="close-sidebar" class="lg:hidden absolute top-4 right-4 text-gray-400 hover:text-white">
        <i class="fas fa-times text-xl"></i>
    </button>
</aside>

<!-- Mobile Sidebar Overlay -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

<script>
    // Close sidebar on mobile
    document.getElementById('close-sidebar')?.addEventListener('click', function() {
        const sidebar = document.getElementById('admin-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
    });
    
    // Overlay click to close
    document.getElementById('sidebar-overlay')?.addEventListener('click', function() {
        const sidebar = document.getElementById('admin-sidebar');
        this.classList.add('hidden');
        sidebar.classList.add('-translate-x-full');
    });
</script>