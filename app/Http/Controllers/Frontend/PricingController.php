<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use Illuminate\View\View;

class PricingController extends Controller
{
    public function index(): View
    {
        $pricingPackages = PricingPackage::active()
            ->orderBy('price')
            ->get();

        return view('frontend.pricing.index', ['packages' => $pricingPackages]);
    }
}
