<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PricingPackage extends Model
{
    use HasFactory;

    protected $table = 'pricing_packages';

    protected $fillable = [
        'name_id',
        'name_en',
        'slug',
        'price',
        'description_id',
        'description_en',
        'features_id',
        'features_en',
        'is_popular',
        'is_active',
    ];

    protected $casts = [
        'features_id' => 'array',
        'features_en' => 'array',
        'price' => 'decimal:2',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($package) {
            if (empty($package->slug)) {
                $package->slug = Str::slug($package->name_id);
            }
        });
    }

    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? $this->name_en : $this->name_id;
    }

    public function getDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? $this->description_en : $this->description_id;
    }

    public function getFeaturesAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? $this->features_en : $this->features_id;
    }

    /**
     * Comparison matrix for pricing table (centang per fitur).
     * Keys must match view: consultation, design_2d, material_selection,
     * project_management, supervision, furniture, after_sales.
     */
    public function getComparisonAttribute(): array
    {
        $slug = $this->slug ?? '';

        $matrix = [
            'konsultasi' => [
                'consultation' => true,
                'design_2d' => true,
                'material_selection' => true,
                'project_management' => false,
                'supervision' => false,
                'furniture' => false,
                'after_sales' => false,
            ],
            'basic' => [
                'consultation' => true,
                'design_2d' => true,
                'material_selection' => true,
                'project_management' => false,
                'supervision' => false,
                'furniture' => false,
                'after_sales' => false,
            ],
            'standard' => [
                'consultation' => true,
                'design_2d' => true,
                'material_selection' => true,
                'project_management' => true,
                'supervision' => true,
                'furniture' => true,
                'after_sales' => false,
            ],
            'premium' => [
                'consultation' => true,
                'design_2d' => true,
                'material_selection' => true,
                'project_management' => true,
                'supervision' => true,
                'furniture' => true,
                'after_sales' => true,
            ],
        ];

        return $matrix[$slug] ?? [
            'consultation' => true,
            'design_2d' => true,
            'material_selection' => true,
            'project_management' => true,
            'supervision' => true,
            'furniture' => true,
            'after_sales' => true,
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePopular($query)
    {
        return $query->where('is_popular', true);
    }
}
