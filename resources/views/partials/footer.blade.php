@php
    $locale = app()->getLocale();
    $contact_email = \App\Models\Setting::get('contact_email', 'info@ipminterior.com');
    $contact_phone = \App\Models\Setting::get('contact_phone', '+622112345678');
    $contact_address = $locale === 'en' ? \App\Models\Setting::get('contact_address_en', 'Jakarta, Indonesia') : \App\Models\Setting::get('contact_address_id', 'Jakarta, Indonesia');
    $whatsapp_number = \App\Models\Setting::get('whatsapp_number', '6285177907912');
    $whatsapp_message = $locale === 'en' ? \App\Models\Setting::get('whatsapp_message_en', 'Hello, I am interested in IPM Interior Design services') : \App\Models\Setting::get('whatsapp_message_id', 'Halo, saya tertarik dengan layanan IPM Interior Design');
    $wa_link = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $whatsapp_number) . '?text=' . rawurlencode($whatsapp_message);
    $wa_chat_link = 'https://wa.me/6285177907912?text=' . rawurlencode($whatsapp_message);
    $social_facebook = \App\Models\Setting::get('social_facebook', '');
    $social_instagram = \App\Models\Setting::get('social_instagram', '');
    $social_linkedin = \App\Models\Setting::get('social_linkedin', '');
    $social_youtube = \App\Models\Setting::get('social_youtube', '');
@endphp
<footer class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8 py-8 md:py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            <!-- Company Info -->
            <div class="space-y-4">
                <a href="{{ route('landing', $locale) }}" class="flex items-center space-x-2 group w-fit">
                    <img src="{{ asset('images/Logo.png') }}" alt="AKM Interior Design Logo" class="w-auto h-9 md:h-10">
                    <span class="text-base md:text-lg font-bold truncate">{{ __('Interior Design') }}</span>
                </a>
                <p class="text-gray-400 text-xs md:text-sm leading-relaxed">
                    {{ __('Transforming spaces into extraordinary experiences. Professional interior design services for residential and commercial projects across Indonesia.') }}
                </p>
                <div class="flex space-x-3 md:space-x-4">
                    @if($social_facebook)
                        <a href="{{ $social_facebook }}" target="_blank" rel="noopener" class="text-gray-400 hover:text-white transition-colors" aria-label="Facebook">
                            <i class="fab fa-facebook-f text-base md:text-lg"></i>
                        </a>
                    @endif
                    @if($social_instagram)
                        <a href="{{ $social_instagram }}" target="_blank" rel="noopener" class="text-gray-400 hover:text-white transition-colors" aria-label="Instagram">
                            <i class="fab fa-instagram text-base md:text-lg"></i>
                        </a>
                    @endif
                    @if($social_linkedin)
                        <a href="{{ $social_linkedin }}" target="_blank" rel="noopener" class="text-gray-400 hover:text-white transition-colors" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in text-base md:text-lg"></i>
                        </a>
                    @endif
                    @if($social_youtube)
                        <a href="{{ $social_youtube }}" target="_blank" rel="noopener" class="text-gray-400 hover:text-white transition-colors" aria-label="YouTube">
                            <i class="fab fa-youtube text-base md:text-lg"></i>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-base md:text-lg font-semibold mb-3 md:mb-4">{{ __('Quick Links') }}</h3>
                <ul class="space-y-1.5 md:space-y-2">
                    <li><a href="{{ route('landing', $locale) }}" class="text-gray-400 hover:text-white transition-colors text-xs md:text-sm">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('gallery', $locale) }}" class="text-gray-400 hover:text-white transition-colors text-xs md:text-sm">{{ __('Gallery') }}</a></li>
                    <li><a href="{{ route('services', $locale) }}" class="text-gray-400 hover:text-white transition-colors text-xs md:text-sm">{{ __('Services') }}</a></li>
                    <li><a href="{{ route('pricing', $locale) }}" class="text-gray-400 hover:text-white transition-colors text-xs md:text-sm">{{ __('Pricing') }}</a></li>
                    <li><a href="{{ route('quote.create', $locale) }}" class="text-gray-400 hover:text-white transition-colors text-xs md:text-sm">{{ __('Get Quote') }}</a></li>
                </ul>
            </div>

            <!-- Our Services -->
            <div>
                <h3 class="text-base md:text-lg font-semibold mb-3 md:mb-4">{{ __('Our Services') }}</h3>
                <ul class="space-y-1.5 md:space-y-2">
                    <li><a href="{{ route('services', $locale) }}" class="text-gray-400 hover:text-white transition-colors text-xs md:text-sm">{{ __('Residential Design') }}</a></li>
                    <li><a href="{{ route('services', $locale) }}" class="text-gray-400 hover:text-white transition-colors text-xs md:text-sm">{{ __('Commercial Design') }}</a></li>
                    <li><a href="{{ route('services', $locale) }}" class="text-gray-400 hover:text-white transition-colors text-xs md:text-sm">{{ __('Renovation') }}</a></li>
                    <li><a href="{{ route('services', $locale) }}" class="text-gray-400 hover:text-white transition-colors text-xs md:text-sm">{{ __('Consultation') }}</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-base md:text-lg font-semibold mb-3 md:mb-4">{{ __('Contact Us') }}</h3>
                <ul class="space-y-2 md:space-y-3">
                    <li class="flex items-start space-x-2 md:space-x-3">
                        <i class="fas fa-map-marker-alt text-amber-400 mt-0.5 md:mt-1 flex-shrink-0 text-xs md:text-sm"></i>
                        <span class="text-gray-400 text-xs md:text-sm leading-relaxed">{{ $contact_address ?: __('Jakarta, Indonesia') }}</span>
                    </li>
                    @if($contact_phone)
                    <li class="flex items-center space-x-2 md:space-x-3">
                        <i class="fas fa-phone text-amber-400 flex-shrink-0 text-xs md:text-sm"></i>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contact_phone) }}" class="text-gray-400 hover:text-white transition-colors text-xs md:text-sm truncate">{{ $contact_phone }}</a>
                    </li>
                    @endif
                    @if($contact_email)
                    <li class="flex items-center space-x-2 md:space-x-3">
                        <i class="fas fa-envelope text-amber-400 flex-shrink-0 text-xs md:text-sm"></i>
                        <a href="mailto:{{ $contact_email }}" class="text-gray-400 hover:text-white transition-colors text-xs md:text-sm truncate">{{ $contact_email }}</a>
                    </li>
                    @endif
                    @if($whatsapp_number)
                    <li class="flex items-center space-x-2 md:space-x-3">
                        <i class="fab fa-whatsapp text-amber-400 flex-shrink-0 text-xs md:text-sm"></i>
                        <a href="{{ $wa_link }}" target="_blank" rel="noopener" class="text-gray-400 hover:text-white transition-colors text-xs md:text-sm truncate">{{ $whatsapp_number }}</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-8 md:mt-12 pt-6 md:pt-8 border-t border-gray-800">
            <div class="flex flex-col md:flex-row justify-between items-center gap-3 md:gap-4">
                <p class="text-gray-400 text-xs md:text-sm text-center md:text-left">
                    &copy; {{ date('Y') }} AKM Interior Design. {{ __('All rights reserved.') }}
                </p>
                <div class="flex space-x-4 md:space-x-6">
                    <a href="{{ route('privacy', $locale) }}" class="text-gray-400 hover:text-white transition-colors text-xs md:text-sm">{{ __('Privacy Policy') }}</a>
                    <a href="{{ route('terms', $locale) }}" class="text-gray-400 hover:text-white transition-colors text-xs md:text-sm">{{ __('Terms of Service') }}</a>
                </div>
            </div>
        </div>
    </div>

    <!-- WhatsApp Floating Button - Chat with us (tetap ke 6285177907912) -->
    <a href="{{ $wa_chat_link }}" target="_blank" rel="noopener" class="fixed bottom-4 md:bottom-6 right-4 md:right-6 bg-green-500 hover:bg-green-600 text-white p-3 md:p-4 rounded-full shadow-lg transition-all hover:scale-110 z-50 flex items-center gap-2" aria-label="{{ __('Chat with us') }}">
        <i class="fab fa-whatsapp text-lg md:text-2xl"></i>
        <span class="hidden md:inline font-medium text-xs md:text-sm">{{ __('Chat with us') }}</span>
    </a>
</footer>
