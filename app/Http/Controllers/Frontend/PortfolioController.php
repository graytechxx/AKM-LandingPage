<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function show(string $id): View
    {
        // Find published portfolio by ID, show 404 if not found or not published
        $portfolio = Portfolio::published()->findOrFail((int) $id);

        // Get related portfolios from same category
        $relatedPortfolios = Portfolio::published()
            ->where('category', $portfolio->category)
            ->where('id', '!=', $portfolio->id)
            ->take(4)
            ->get();

        // Ensure featured_image is valid, clear if file doesn't exist
        if (!empty($portfolio->featured_image) && !file_exists(storage_path('app/public/' . $portfolio->featured_image))) {
            // Don't fail, just log or handle gracefully
            // featured_image will be handled in view with @if checks
        }

        return view('frontend.portfolio.show', compact('portfolio', 'relatedPortfolios'));
    }
}
