<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\View\View;

class ServicesController extends Controller
{
    public function index(): View
    {
        $services = Service::active()
            ->latest()
            ->get();

        return view('frontend.services.index', compact('services'));
    }
}
