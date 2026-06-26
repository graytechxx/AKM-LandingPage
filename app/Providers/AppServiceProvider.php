<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\QuoteRequest;
use App\Models\ContactMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('partials.admin-sidebar', function ($view) {
            $view->with('pendingQuotes', QuoteRequest::where('status', 'pending')->count());
            $view->with('unreadMessages', ContactMessage::unread()->count());
        });
    }
}
