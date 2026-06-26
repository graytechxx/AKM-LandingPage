<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SettingController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {
        
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        // Portfolios
        Route::resource('portfolios', PortfolioController::class);
        Route::post('/portfolios/{portfolio}/toggle-featured', [PortfolioController::class, 'toggleFeatured'])
            ->name('portfolios.toggle-featured');
        
        // Services
        Route::resource('services', ServiceController::class);
        
        // Pricing Packages
        Route::resource('pricing', PricingController::class);
        
        // Testimonials
        Route::resource('testimonials', TestimonialController::class);
        
        // Quote Requests
        Route::get('/quotes', [QuoteController::class, 'index'])->name('quotes.index');
        Route::get('/quotes/export', [QuoteController::class, 'export'])->name('quotes.export');
        Route::get('/quotes/{quote}', [QuoteController::class, 'show'])->name('quotes.show');
        Route::patch('/quotes/{quote}/status', [QuoteController::class, 'updateStatus'])
            ->name('quotes.status');
        Route::post('/quotes/{quote}/send', [QuoteController::class, 'sendQuote'])
            ->name('quotes.send');
        Route::delete('/quotes/{quote}', [QuoteController::class, 'destroy'])
            ->name('quotes.destroy');
        
        // Contact Messages
        Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
        Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
        Route::patch('/contacts/{contact}/read', [ContactController::class, 'markAsRead'])
            ->name('contacts.read');
        Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])
            ->name('contacts.destroy');
        
        // Settings
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    });
