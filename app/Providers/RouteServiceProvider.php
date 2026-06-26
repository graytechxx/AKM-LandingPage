<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/admin';

    /**
     * The controller namespace for the application.
     *
     * @var string|null
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Auth routes MUST be loaded first so /login, /register etc. are not caught by {locale?}
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/auth.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));
        });

        $this->configureMiddlewareAliases();
        $this->configureRouteBindings();
    }

    /**
     * Configure the middleware aliases for the application.
     */
    protected function configureMiddlewareAliases(): void
    {
        $router = $this->app['router'];
        
        // Register middleware aliases
        $router->aliasMiddleware('setlocale', \App\Http\Middleware\SetLocale::class);
        $router->aliasMiddleware('admin', \App\Http\Middleware\AdminMiddleware::class);
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        // Custom rate limiter for contact form submissions
        RateLimiter::for('contact', function (Request $request) {
            return Limit::perMinute(5)->by($request->ip());
        });

        // Custom rate limiter for quote requests
        RateLimiter::for('quote', function (Request $request) {
            return Limit::perMinute(3)->by($request->ip());
        });
    }

    /**
     * Configure route bindings.
     */
    protected function configureRouteBindings(): void
    {
        // Route model binding for Portfolio: by ID (admin) atau by slug (frontend)
        Route::bind('portfolio', function ($value) {
            if (is_numeric($value)) {
                return \App\Models\Portfolio::findOrFail($value);
            }
            return \App\Models\Portfolio::where('slug', $value)
                ->where('status', 'published')
                ->firstOrFail();
        });

        // Route model binding for Service by slug or ID
        Route::bind('service', function ($value) {
            if (is_numeric($value)) {
                return \App\Models\Service::findOrFail($value);
            }
            return \App\Models\Service::where('slug', $value)
                ->where('is_active', true)
                ->firstOrFail();
        });

        // Route model binding for Pricing Package by slug or ID
        Route::bind('pricing', function ($value) {
            if (is_numeric($value)) {
                return \App\Models\PricingPackage::findOrFail($value);
            }
            return \App\Models\PricingPackage::where('slug', $value)
                ->where('is_active', true)
                ->firstOrFail();
        });
    }
}
