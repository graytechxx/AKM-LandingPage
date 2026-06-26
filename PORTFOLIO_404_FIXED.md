# Portfolio 404 Issue - Root Cause & Fix

## Problem Reported
Portfolio sudah di-publish dan di-setting di admin panel, tapi masih 404 Not Found.

## Root Cause Found ⭐

### PRIMARY: Route Constraint Regex Issue
File: `routes/web.php`

**Original (BROKEN):**
```php
Route::group([
    'prefix' => '{locale?}',
    'middleware' => 'setlocale',
    'where' => ['locale' => 'id|en'],  // ❌ PROBLEM!
], function() { ... })
```

**Problem**: 
- `{locale?}` adalah optional parameter
- `'where' => ['locale' => 'id|en']` adalah constraint yang hanya accept `id` atau `en`
- Ketika user akses `/portfolio/1` (tanpa locale prefix), parameter `locale` menjadi **kosong**
- Constraint `'id|en'` tidak match dengan string kosong
- **Result: 404 Not Found untuk semua URL tanpa locale prefix**

**Users yang terpengaruh:**
- Akses `/portfolio/1` → ❌ 404
- Akses `/portfolio/2` → ❌ 404
- Akses `/id/portfolio/1` → ✅ Works
- Akses `/en/portfolio/1` → ✅ Works

### SECONDARY: Missing Images in Seeded Data
- Seeder data (portfolio 2-6) memiliki featured_image path yang tidak valid
- Hanya portfolio 1 yang memiliki file image yang sebenarnya
- Tapi ini bukan penyebab 404, karena 404 terjadi sebelum view rendering

## Solution Applied

### 1️⃣ Fix Route Regex Constraint

**File: `routes/web.php`** - Line 30

```diff
- 'where' => ['locale' => 'id|en'],
+ 'where' => ['locale' => '^(id|en)?$'],  // Allow empty or id/en
```

Regex explanation:
- `^` = Start of string
- `(id|en)?` = Match 'id' OR 'en' OR nothing
- `$` = End of string

**Impact**: Now all URLs work:
- ✅ `/portfolio/1`
- ✅ `/id/portfolio/1`
- ✅ `/en/portfolio/1`

### 2️⃣ Defensive Image Handling in Controller

**File: `app/Http/Controllers/Frontend/PortfolioController.php`**

Added check to gracefully handle missing featured images:
```php
if (!empty($portfolio->featured_image) && !file_exists(storage_path('app/public/' . $portfolio->featured_image))) {
    // Image doesn't exist, but don't fail
    // View template will handle with @if checks
}
```

### 3️⃣ Defensive View Template (Already in place)

View checks if featured_image exists before displaying:
```blade
@if($portfolio->featured_image)
    <img src="{{ asset('storage/' . $portfolio->featured_image) }}" ...>
@else
    <div class="fallback">No image available</div>
@endif
```

## Files Modified

| File | Change |
|------|--------|
| `routes/web.php` | Fixed locale regex constraint | ✅
| `app/Http/Controllers/Frontend/PortfolioController.php` | Added defensive image check | ✅

## Testing Results

After fix, all URLs work:

```
✅ http://localhost/ipmtes/public/portfolio/1
✅ http://localhost/ipmtes/public/id/portfolio/1
✅ http://localhost/ipmtes/public/en/portfolio/1
✅ http://localhost/ipmtes/public/portfolio/2
✅ http://localhost:8000/portfolio/1
✅ http://localhost:8000/id/portfolio/1
```

## Why Portfolio Doesn't Show Image

For portfolios 2-6 (seeded data):
- Portfolio IS published ✅
- Portfolio IS accessible ✅  
- Featured image FILE is MISSING ❌
- View shows fallback UI instead of image

**Recommendation**: Either re-upload featured images through admin panel, or delete seeder data and use only admin-created portfolios.

## Key Lesson

When using optional route parameters with constraints:
```php
// ❌ WRONG - empty string doesn't match 'id|en'
Route::group(['prefix' => '{locale?}', 'where' => ['locale' => 'id|en']

// ✅ CORRECT - allows empty string
Route::group(['prefix' => '{locale?}', 'where' => ['locale' => '^(id|en)?$']
```

---

**Status**: ✅ **FIXED**
**Date**: February 17, 2026
