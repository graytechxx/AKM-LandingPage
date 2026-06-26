<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'project_type',
        'location',
        'area_sqm',
        'budget_range',
        'timeline',
        'description',
        'reference_images',
        'status',
        'admin_notes',
        'quoted_price',
    ];

    protected $casts = [
        'reference_images' => 'array',
        'area_sqm' => 'decimal:2',
        'quoted_price' => 'decimal:2',
    ];

    public const STATUSES = [
        'pending' => 'Pending',
        'in_review' => 'In Review',
        'quoted' => 'Quoted',
        'accepted' => 'Accepted',
        'rejected' => 'Rejected',
    ];

    public const PROJECT_TYPES = [
        'house' => 'Rumah / House',
        'apartment' => 'Apartemen / Apartment',
        'office' => 'Kantor / Office',
        'commercial' => 'Komersial / Commercial',
        'other' => 'Lainnya / Other',
    ];

    public const BUDGET_RANGES = [
        'under_5m' => '< Rp 5 Juta',
        '5m_to_15m' => 'Rp 5 - 15 Juta',
        '15m_to_30m' => 'Rp 15 - 30 Juta',
        '30m_to_50m' => 'Rp 30 - 50 Juta',
        'above_50m' => '> Rp 50 Juta',
        'custom' => 'Custom / Menyesuaikan',
    ];

    public const TIMELINES = [
        'immediate' => 'Segera / Immediate',
        '1_to_3_months' => '1-3 Bulan / Months',
        '3_to_6_months' => '3-6 Bulan / Months',
        'above_6_months' => '> 6 Bulan / Months',
        'flexible' => 'Fleksibel / Flexible',
    ];

    public function getStatusLabelAttribute()
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }

    public function getProjectTypeLabelAttribute()
    {
        return self::PROJECT_TYPES[$this->project_type] ?? $this->project_type;
    }

    public function getBudgetRangeLabelAttribute()
    {
        return self::BUDGET_RANGES[$this->budget_range] ?? $this->budget_range;
    }

    public function getTimelineLabelAttribute()
    {
        return self::TIMELINES[$this->timeline] ?? $this->timeline;
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeInReview($query)
    {
        return $query->where('status', 'in_review');
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
