<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_id',
        'name_en',
        'slug',
        'short_description_id',
        'short_description_en',
        'description_id',
        'description_en',
        'icon',
        'features_id',
        'features_en',
        'process_steps_id',
        'process_steps_en',
        'starting_price',
        'is_active',
    ];

    protected $casts = [
        'features_id' => 'array',
        'features_en' => 'array',
        'process_steps_id' => 'array',
        'process_steps_en' => 'array',
        'starting_price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->name_id);
            }
        });
    }

    public function getNameAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? $this->name_en : $this->name_id;
    }

    public function getShortDescriptionAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? $this->short_description_en : $this->short_description_id;
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

    public function getProcessStepsAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? $this->process_steps_en : $this->process_steps_id;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
