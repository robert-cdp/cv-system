<?php

namespace App\Models\Product;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasSlug;

    protected $table = "products";

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'price',
        'stock',
        'status',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
