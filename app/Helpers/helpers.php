<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('formatRupiah')) {
    /**
     * Format number to Indonesian Rupiah
     *
     * @param float|int|null $amount Amount to format
     * @param bool $withPrefix Whether to include 'Rp ' prefix
     * @param int $decimal Number of decimal places
     * @return string Formatted Rupiah string
     */
    function formatRupiah(float|int|null $amount, bool $withPrefix = true, int $decimal = 0): string
    {
        if ($amount === null) {
            return $withPrefix ? 'Rp 0' : '0';
        }

        $formatted = number_format($amount, $decimal, ',', '.');
        
        return $withPrefix ? 'Rp ' . $formatted : $formatted;
    }
}

if (!function_exists('getLocale')) {
    /**
     * Get current application locale
     *
     * @return string Current locale code
     */
    function getLocale(): string
    {
        return app()->getLocale();
    }
}

if (!function_exists('isActiveRoute')) {
    /**
     * Check if current route matches the given route pattern
     *
     * @param string|array $route Route name(s) or pattern(s) to check
     * @param string $class CSS class to return if active (default: 'active')
     * @return string CSS class if active, empty string otherwise
     */
    function isActiveRoute(string|array $route, string $class = 'active'): string
    {
        $currentRoute = Route::currentRouteName();
        
        if (is_array($route)) {
            foreach ($route as $r) {
                if (str_starts_with($currentRoute, $r)) {
                    return $class;
                }
            }
        } else {
            // Support wildcards
            if (str_contains($route, '*')) {
                $pattern = str_replace('*', '', $route);
                if (str_starts_with($currentRoute, $pattern)) {
                    return $class;
                }
            } elseif ($currentRoute === $route || str_starts_with($currentRoute, $route . '.')) {
                return $class;
            }
        }
        
        return '';
    }
}

if (!function_exists('truncateText')) {
    /**
     * Truncate text with ellipsis
     *
     * @param string|null $text Text to truncate
     * @param int $length Maximum length
     * @param string $ending Ending to append (default: '...')
     * @param bool $exact Whether to cut at exact length or word boundary
     * @return string Truncated text
     */
    function truncateText(?string $text, int $length = 100, string $ending = '...', bool $exact = false): string
    {
        if (empty($text)) {
            return '';
        }

        if (strlen($text) <= $length) {
            return $text;
        }

        if ($exact) {
            return substr($text, 0, $length) . $ending;
        }

        // Truncate at word boundary
        $truncated = substr($text, 0, $length);
        $lastSpace = strrpos($truncated, ' ');
        
        if ($lastSpace !== false) {
            $truncated = substr($truncated, 0, $lastSpace);
        }
        
        return $truncated . $ending;
    }
}

if (!function_exists('formatDate')) {
    /**
     * Format date with locale support
     *
     * @param string|DateTime|null $date Date to format
     * @param string $format Format string
     * @param string|null $locale Locale override
     * @return string Formatted date
     */
    function formatDate(string|DateTime|null $date, string $format = 'd M Y', ?string $locale = null): string
    {
        if (empty($date)) {
            return '-';
        }

        $locale = $locale ?? getLocale();
        $dateObj = $date instanceof DateTime ? $date : new DateTime($date);
        
        // Set locale for month names
        $locales = [
            'id' => 'id_ID',
            'en' => 'en_US',
        ];
        
        $setLocale = $locales[$locale] ?? 'en_US';
        
        // For Indonesian month names
        if ($locale === 'id') {
            $months = [
                'Jan' => 'Jan',
                'Feb' => 'Feb',
                'Mar' => 'Mar',
                'Apr' => 'Apr',
                'May' => 'Mei',
                'Jun' => 'Jun',
                'Jul' => 'Jul',
                'Aug' => 'Agu',
                'Sep' => 'Sep',
                'Oct' => 'Okt',
                'Nov' => 'Nov',
                'Dec' => 'Des',
            ];
            
            $formatted = $dateObj->format($format);
            return strtr($formatted, $months);
        }
        
        return $dateObj->format($format);
    }
}

if (!function_exists('setting')) {
    /**
     * Get setting value by key
     *
     * @param string $key Setting key
     * @param mixed $default Default value
     * @return mixed Setting value
     */
    function setting(string $key, mixed $default = null): mixed
    {
        return \App\Models\Setting::get($key, $default);
    }
}

if (!function_exists('assetLocale')) {
    /**
     * Generate asset URL with locale prefix
     *
     * @param string $path Asset path
     * @param string|null $locale Locale code
     * @param bool|null $secure Whether to force HTTPS
     * @return string Asset URL
     */
    function assetLocale(string $path, ?string $locale = null, ?bool $secure = null): string
    {
        $locale = $locale ?? getLocale();
        return asset($path, $secure);
    }
}

if (!function_exists('localizedRoute')) {
    /**
     * Generate localized route URL
     *
     * @param string $name Route name (with or without locale suffix)
     * @param array $parameters Route parameters
     * @param string|null $locale Locale code
     * @param bool $absolute Whether to generate absolute URL
     * @return string Route URL
     */
    function localizedRoute(string $name, array $parameters = [], ?string $locale = null, bool $absolute = true): string
    {
        $locale = $locale ?? getLocale();
        
        // Build route name with locale suffix (e.g., 'portfolio.show.id' for locale 'id')
        $localizedRouteName = $name . '.' . $locale;
        
        try {
            // Try localized route first
            return route($localizedRouteName, $parameters, $absolute);
        } catch (\Exception $e) {
            // Fall back to non-localized route if localized doesn't exist
            try {
                return route($name, $parameters, $absolute);
            } catch (\Exception $e2) {
                // If neither works, log and return hash
                \Log::warning("Route '$localizedRouteName' or '$name' not found");
                return '#';
            }
        }
    }
}

if (!function_exists('isRtl')) {
    /**
     * Check if current locale is RTL (Right-to-Left)
     *
     * @return bool True if RTL, false otherwise
     */
    function isRtl(): bool
    {
        $rtlLocales = ['ar', 'he', 'fa', 'ur'];
        return in_array(getLocale(), $rtlLocales);
    }
}

if (!function_exists('cleanPhoneNumber')) {
    /**
     * Clean and format phone number
     *
     * @param string|null $phone Phone number
     * @param bool $withCountryCode Whether to include country code
     * @return string Cleaned phone number
     */
    function cleanPhoneNumber(?string $phone, bool $withCountryCode = true): string
    {
        if (empty($phone)) {
            return '';
        }

        // Remove non-numeric characters
        $cleaned = preg_replace('/[^0-9]/', '', $phone);
        
        if ($withCountryCode) {
            // Add Indonesia country code if not present
            if (!str_starts_with($cleaned, '62') && !str_starts_with($cleaned, '0')) {
                $cleaned = '62' . $cleaned;
            } elseif (str_starts_with($cleaned, '0')) {
                $cleaned = '62' . substr($cleaned, 1);
            }
        } else {
            // Remove country code if present
            if (str_starts_with($cleaned, '62')) {
                $cleaned = '0' . substr($cleaned, 2);
            }
        }
        
        return $cleaned;
    }
}
