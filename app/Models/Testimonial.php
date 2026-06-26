<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_photo',
        'project_name',
        'content_id',
        'content_en',
        'rating',
        'is_active',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_active' => 'boolean',
    ];

    public function getContentAttribute()
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? $this->content_en : $this->content_id;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
