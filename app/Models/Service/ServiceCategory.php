<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServiceCategory extends Model
{
    protected $table = "service_categories";

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description',
    ];

    protected static function booted()
    {
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    public function scopeSlug($query, string $slug)
    {
        return $query->where('slug', $slug);
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }
}
