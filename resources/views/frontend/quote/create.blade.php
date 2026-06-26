@extends('layouts.app')

@section('title', __('meta.quote.title'))
@section('meta')
    <meta name="description" content="{{ __('meta.quote.description') }}">
    <meta name="keywords" content="{{ __('meta.quote.keywords') }}">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative py-12 md:py-20 bg-gray-900">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/quote-hero.jpg') }}" alt="{{ __('pages.quote.title') }}" 
                 class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-900/90 to-gray-900/70"></div>
        </div>
        
        <div class="relative z-10 container mx-auto px-3 sm:px-4 md:px-6 lg:px-8 text-center">
            <span class="text-green-400 font-semibold text-xs sm:text-sm uppercase tracking-wider mb-2 md:mb-4 block">
                {{ __('pages.quote.subtitle') }}
            </span>
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-serif font-bold text-white mb-3 md:mb-6 px-2">
                {{ __('pages.quote.title') }}
            </h1>
            <p class="text-sm sm:text-base md:text-lg lg:text-xl text-gray-300 max-w-3xl mx-auto px-2">
                {{ __('pages.quote.description') }}
            </p>
        </div>
    </section>

    <!-- WhatsApp CTA Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <!-- Main WhatsApp Card -->
                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border-t-4 border-green-500">
                    <!-- Header -->
                    <div class="bg-gradient-to-r from-green-500 to-green-600 px-8 py-12 text-center">
                        <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-12 h-12 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.272-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-9.746 9.776c0 2.716.738 5.355 2.122 7.651L2.601 22.3l8.147-2.138c2.226 1.214 4.72 1.856 7.266 1.856 9.576 0 17.363-7.75 17.363-17.3 0-4.625-1.777-8.966-5.01-12.216-3.23-3.25-7.547-5.084-12.117-5.084 0 0 .032 0 .031 0z"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl md:text-3xl font-bold text-white mb-2">
                            {{ __('pages.quote.form_title') }}
                        </h2>
                        <p class="text-green-50 mb-2">{{ __('pages.quote.form_subtitle') }}</p>
                    </div>

                    <!-- Content -->
                    <div class="p-8 md:p-12">
                        <!-- Description -->
                        <div class="mb-8">
                            <p class="text-gray-700 text-base md:text-lg mb-6 leading-relaxed text-center">
                                {{ __('pages.quote.whatsapp_description') }}
                            </p>
                        </div>

                        <!-- WhatsApp Button -->
                        <div class="mb-8">
                            <a href="https://wa.me/{{ str_replace('+', '', $whatsappNumber) }}?text={{ urlencode($whatsappMessage) }}" 
                               target="_blank" rel="noopener noreferrer"
                               class="block w-full bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold py-4 px-8 rounded-lg transition duration-300 transform hover:scale-105 flex items-center justify-center text-lg shadow-lg">
                                <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.272-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-9.746 9.776c0 2.716.738 5.355 2.122 7.651L2.601 22.3l8.147-2.138c2.226 1.214 4.72 1.856 7.266 1.856 9.576 0 17.363-7.75 17.363-17.3 0-4.625-1.777-8.966-5.01-12.216-3.23-3.25-7.547-5.084-12.117-5.084 0 0 .032 0 .031 0z"/>
                                </svg>
                                {{ __('pages.quote.whatsapp_cta') }}
                            </a>
                        </div>

                        <!-- Alternative Contact -->
                        <div class="border-t border-gray-200 pt-8">
                            <p class="text-sm text-gray-600 text-center mb-6">{{ __('messages.or') }}</p>
                            <div class="grid md:grid-cols-3 gap-4">
                                <a href="mailto:{{ \App\Models\Setting::get('contact_email', 'info@ipminterior.com') }}" 
                                   class="flex items-center p-3 border border-gray-300 rounded-lg hover:border-amber-500 hover:bg-amber-50 transition">
                                    <svg class="w-6 h-6 text-amber-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <div class="text-left min-w-0">
                                        <p class="font-semibold text-gray-900 text-sm">{{ __('pages.quote.email_title') }}</p>
                                        <p class="text-gray-600 text-xs truncate">{{ \App\Models\Setting::get('contact_email', 'info@ipminterior.com') }}</p>
                                    </div>
                                </a>

                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', \App\Models\Setting::get('contact_phone', '+622112345678')) }}" 
                                   class="flex items-center p-3 border border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition">
                                    <svg class="w-6 h-6 text-blue-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <div class="text-left min-w-0">
                                        <p class="font-semibold text-gray-900 text-sm">{{ app()->getLocale() === 'en' ? 'Phone' : 'Telepon' }}</p>
                                        <p class="text-gray-600 text-xs truncate">{{ \App\Models\Setting::get('contact_phone', '+622112345678') }}</p>
                                    </div>
                                </a>

                                <a href="https://wa.me/{{ str_replace('+', '', \App\Models\Setting::get('whatsapp_number', '6285177907912')) }}" 
                                   target="_blank" rel="noopener noreferrer"
                                   class="flex items-center p-3 border border-gray-300 rounded-lg hover:border-green-500 hover:bg-green-50 transition">
                                    <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.272-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-9.746 9.776c0 2.716.738 5.355 2.122 7.651L2.601 22.3l8.147-2.138c2.226 1.214 4.72 1.856 7.266 1.856 9.576 0 17.363-7.75 17.363-17.3 0-4.625-1.777-8.966-5.01-12.216-3.23-3.25-7.547-5.084-12.117-5.084 0 0 .032 0 .031 0z"/>
                                    </svg>
                                    <div class="text-left min-w-0">
                                        <p class="font-semibold text-gray-900 text-sm">WhatsApp</p>
                                        <p class="text-gray-600 text-xs truncate">{{ \App\Models\Setting::get('whatsapp_number', '6285177907912') }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Response Time Info -->
                        <div class="mt-8 p-4 bg-green-50 rounded-lg border border-green-200">
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <p class="font-semibold text-gray-900">{{ __('pages.quote.response_title') }}</p>
                                    <p class="text-sm text-gray-700">{{ __('pages.quote.response_text') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Benefits Section -->
                <div class="mt-12 grid md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-lg transition">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ app()->getLocale() === 'en' ? 'Quick Access' : 'Akses Cepat' }}</h3>
                        <p class="text-sm text-gray-600">{{ app()->getLocale() === 'en' ? 'Direct chat without complicated forms' : 'Chat langsung tanpa form yang rumit' }}</p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-lg transition">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ app()->getLocale() === 'en' ? 'Fast Response' : 'Respons Cepat' }}</h3>
                        <p class="text-sm text-gray-600">{{ app()->getLocale() === 'en' ? 'Usually respond within minutes' : 'Biasanya merespons dalam hitungan menit' }}</p>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow text-center hover:shadow-lg transition">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-7 h-7 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ app()->getLocale() === 'en' ? 'Direct Communication' : 'Komunikasi Langsung' }}</h3>
                        <p class="text-sm text-gray-600">{{ app()->getLocale() === 'en' ? 'Real-time project discussion' : 'Diskusi real-time tentang proyek Anda' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">
                    {{ app()->getLocale() === 'en' ? 'Frequently Asked Questions' : 'Pertanyaan yang Sering Diajukan' }}
                </h2>
                
                <div class="space-y-4" x-data="{ openedIdx: null }">
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <button @click="openedIdx = openedIdx === 0 ? null : 0" class="w-full px-6 py-4 flex items-center justify-between bg-white hover:bg-gray-50 transition">
                            <span class="font-semibold text-gray-900 text-left">{{ app()->getLocale() === 'en' ? 'How do I send reference images?' : 'Bagaimana cara mengirim referensi gambar?' }}</span>
                            <svg class="w-5 h-5 text-gray-500 transition-transform duration-200 flex-shrink-0 ml-4" :class="{ 'transform rotate-180': openedIdx === 0 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="openedIdx === 0" class="px-6 py-4 border-t text-gray-700 text-sm leading-relaxed" x-cloak>
                            {{ app()->getLocale() === 'en' ? 'You can share photos directly through WhatsApp. Just click the "Chat on WhatsApp" button and send your reference photos.' : 'Anda bisa membagikan foto langsung melalui WhatsApp. Cukup klik tombol "Chat di WhatsApp" dan kirimkan foto referensi Anda.' }}
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <button @click="openedIdx = openedIdx === 1 ? null : 1" class="w-full px-6 py-4 flex items-center justify-between bg-white hover:bg-gray-50 transition">
                            <span class="font-semibold text-gray-900 text-left">{{ app()->getLocale() === 'en' ? 'How long is the response time?' : 'Berapa lama waktu respons?' }}</span>
                            <svg class="w-5 h-5 text-gray-500 transition-transform duration-200 flex-shrink-0 ml-4" :class="{ 'transform rotate-180': openedIdx === 1 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="openedIdx === 1" class="px-6 py-4 border-t text-gray-700 text-sm leading-relaxed" x-cloak>
                            {{ app()->getLocale() === 'en' ? 'We usually respond within minutes. Outside business hours, we will reply the next morning.' : 'Kami biasanya merespons dalam hitungan menit. Jika luar jam kerja, kami akan membalas di pagi hari.' }}
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <button @click="openedIdx = openedIdx === 2 ? null : 2" class="w-full px-6 py-4 flex items-center justify-between bg-white hover:bg-gray-50 transition">
                            <span class="font-semibold text-gray-900 text-left">{{ app()->getLocale() === 'en' ? 'What information should I prepare?' : 'Apa informasi yang perlu saya siapkan?' }}</span>
                            <svg class="w-5 h-5 text-gray-500 transition-transform duration-200 flex-shrink-0 ml-4" :class="{ 'transform rotate-180': openedIdx === 2 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div x-show="openedIdx === 2" class="px-6 py-4 border-t text-gray-700 text-sm leading-relaxed" x-cloak>
                            {{ app()->getLocale() === 'en' ? 'Please prepare details such as project location, area size, type of project (residential/commercial), budget range, timeline, and any design references.' : 'Siapkan informasi: lokasi proyek, ukuran area, jenis proyek (rumah/kantor/dll), budget range, timeline, dan foto referensi jika ada.' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
