<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', __('IPM Interior Design - Professional Interior Design Services in Indonesia'))">
    
    <title>@yield('title') | {{ __('IPM Interior Design') }}</title>
    
    @yield('meta')
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom Styles -->
    <style>
        .nav-link {
            @apply text-gray-600 hover:text-gray-900 px-2 py-2 text-sm font-medium tracking-wide transition-colors duration-200;
        }
        .nav-link.active {
            @apply text-gray-900;
        }
    </style>
    
    @yield('styles')
</head>
<body class="bg-gray-50 font-sans antialiased">
    <div id="app">
        <!-- Navigation -->
        @include('partials.navbar')
        
        <!-- Main Content -->
        <main>
            @yield('content')
        </main>
        
        <!-- Footer -->
        @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script>
        // CSRF Token for AJAX requests
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
    
    @yield('scripts')
    @stack('scripts')
</body>
</html>