<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switch(string $locale): RedirectResponse
    {
        $availableLocales = ['id', 'en'];

        if (!in_array($locale, $availableLocales, true)) {
            $locale = 'id';
        }

        session(['locale' => $locale]);

        app()->setLocale($locale);

        return redirect()->back()->with('success', 'Language switched successfully.');
    }
}
