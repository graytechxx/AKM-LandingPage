<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_id',
        'title_en',
        'slug',
        'description_id',
        'description_en',
        'category',
        'client',
        'location',
        'area_sqm',
        'duration',
        'budget_range',
        'featured_image',
        'gallery_images',
        'is_featured',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'gallery_images' => 'array',
        'is_featured' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($portfolio) {
            if (empty($portfolio->slug)) {
                $portfolio->slug = Str::slug($portfolio->title_id ?? 'portfolio-' . $portfolio->id);
            }
        });

        static::saving(function ($portfolio) {
            if (empty(trim($portfolio->slug ?? ''))) {
                $portfolio->slug = Str::slug($portfolio->title_id ?? 'portfolio-' . $portfolio->id);
            }
        });
    }

    public function getSlugAttribute($value)
    {
        if (!empty($value)) {
            return $value;
        }
        return Str::slug($this->title_id ?? $this->id);
    }

    public function getTitleAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? $this->title_en : $this->title_id;
    }

    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? $this->description_en : $this->description_id;
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        if ($category && $category !== 'all') {
            return $query->where('category', $category);
        }
        return $query;
    }
}
