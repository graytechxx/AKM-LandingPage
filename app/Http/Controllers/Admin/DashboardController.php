<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\QuoteRequest;
use App\Models\ContactMessage;
use App\Models\Service;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard with statistics
     */
    public function index(): View
    {
        $stats = [
            'portfolio_count' => Portfolio::count(),
            'pending_quotes' => QuoteRequest::where('status', 'pending')->count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
            'service_count' => Service::where('is_active', true)->count(),
        ];

        $recentQuotes = QuoteRequest::recent()
            ->take(5)
            ->get();

        $recentMessages = ContactMessage::recent()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentQuotes', 'recentMessages'));
    }
}
