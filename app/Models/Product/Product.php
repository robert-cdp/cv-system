<?php

namespace App\Models\Product;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasSlug;

    protected $table = "products";
}
