<?php

namespace App\Models\Product;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasSlug;

    protected $table = "products_categories";

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];
}
