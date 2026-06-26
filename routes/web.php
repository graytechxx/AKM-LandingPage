<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\LandingPageController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\PricingController;
use App\Http\Controllers\Frontend\PortfolioController;
use App\Http\Controllers\Frontend\QuoteController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\LanguageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Language Switcher
Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

// Frontend Routes - ID Locale
Route::group([
    'prefix' => 'id',
    'middleware' => 'setlocale',
], function() {
    // Landing Page
    Route::get('/', [LandingPageController::class, 'index'])->name('landing.id');

    // Portfolio Detail
    Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show.id')->where('id', '[0-9]+');
    
    // Gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.id');
    
    // Services
    Route::get('/services', [ServicesController::class, 'index'])->name('services.id');
    
    // Pricing
    Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.id');
    
    // Quote Request
    Route::get('/request-quote', [QuoteController::class, 'create'])->name('quote.create.id');
    Route::post('/request-quote', [QuoteController::class, 'store'])->name('quote.store.id');
    
    // Contact
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store.id');

    // Static pages
    Route::get('/privacy-policy', function () { return view('frontend.pages.privacy'); })->name('privacy.id');
    Route::get('/terms', function () { return view('frontend.pages.terms'); })->name('terms.id');
});

// Frontend Routes - EN Locale
Route::group([
    'prefix' => 'en',
    'middleware' => 'setlocale',
], function() {
    // Landing Page
    Route::get('/', [LandingPageController::class, 'index'])->name('landing.en');

    // Portfolio Detail
    Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show.en')->where('id', '[0-9]+');
    
    // Gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.en');
    
    // Services
    Route::get('/services', [ServicesController::class, 'index'])->name('services.en');
    
    // Pricing
    Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.en');
    
    // Quote Request
    Route::get('/request-quote', [QuoteController::class, 'create'])->name('quote.create.en');
    Route::post('/request-quote', [QuoteController::class, 'store'])->name('quote.store.en');
    
    // Contact
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store.en');

    // Static pages
    Route::get('/privacy-policy', function () { return view('frontend.pages.privacy'); })->name('privacy.en');
    Route::get('/terms', function () { return view('frontend.pages.terms'); })->name('terms.en');
});

// Frontend Routes with Default Locale (no prefix)
Route::group([
    'middleware' => 'setlocale',
], function() {
    // Landing Page
    Route::get('/', [LandingPageController::class, 'index'])->name('landing');

    // Portfolio Detail  
    Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show')->where('id', '[0-9]+');
    
    // Gallery
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    
    // Services
    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    
    // Pricing
    Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');
    
    // Quote Request
    Route::get('/request-quote', [QuoteController::class, 'create'])->name('quote.create');
    Route::post('/request-quote', [QuoteController::class, 'store'])->name('quote.store');
    
    // Contact
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    // Static pages
    Route::get('/privacy-policy', function () { return view('frontend.pages.privacy'); })->name('privacy');
    Route::get('/terms', function () { return view('frontend.pages.terms'); })->name('terms');
});

// Admin Routes
require __DIR__.'/admin.php';
