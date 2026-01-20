<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $table = "services";

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'subtitle',
        'icon',
        'description',
        'price',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    protected static function booted()
    {
        static::creating(function ($service) {
            $service->slug = Str::slug($service->name);
        });

        static::updating(function ($service) {
            $service->slug = Str::slug($service->name);
        });
    }

    public function scopeSlug($query, string $slug)
    {
        return $query->where('slug', $slug);
    }

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }
}
