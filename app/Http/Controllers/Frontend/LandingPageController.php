<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\PricingPackage;
use App\Models\Testimonial;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function index(): View
    {
        // Proyek kami: tampilkan hingga 12 (featured dulu, lalu terbaru)
        $featuredPortfolios = Portfolio::published()
            ->orderByRaw('is_featured DESC, created_at DESC')
            ->take(12)
            ->get();

        $activeServices = Service::active()
            ->latest()
            ->take(4)
            ->get();

        $activePricing = PricingPackage::active()
            ->latest()
            ->take(3)
            ->get();

        $activeTestimonials = Testimonial::active()
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.landing.index', compact(
            'featuredPortfolios',
            'activeServices',
            'activePricing',
            'activeTestimonials'
        ));
    }
}
