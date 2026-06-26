<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(Request $request): View
    {
        $category = $request->get('category', 'all');

        $portfolios = Portfolio::published()
            ->byCategory($category)
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $categories = Portfolio::published()
            ->select('category')
            ->distinct()
            ->pluck('category');

        return view('frontend.gallery.index', compact('portfolios', 'categories', 'category'));
    }
}
