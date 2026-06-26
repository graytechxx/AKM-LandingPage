<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuoteController extends Controller
{
    public function create(): View
    {
        // Get WhatsApp number from settings or use default
        $whatsappNumber = Setting::get('whatsapp_number', '6281234567890');
        $whatsappMessage = __('pages.quote.whatsapp_message');

        return view('frontend.quote.create', compact(
            'whatsappNumber',
            'whatsappMessage'
        ));
    }

    public function store(Request $request): RedirectResponse
    {
        // Get WhatsApp number from settings
        $whatsappNumber = Setting::get('whatsapp_number', '6281234567890');
        $message = __('pages.quote.whatsapp_message');

        // Encode message for WhatsApp
        $encodedMessage = urlencode($message);

        // Redirect to WhatsApp without the + sign
        return redirect("https://wa.me/{$whatsappNumber}?text={$encodedMessage}");
    }
}
