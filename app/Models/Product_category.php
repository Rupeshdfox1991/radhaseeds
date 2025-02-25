<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    use HasFactory;

    protected $table = 'product_categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'alt_tag',
        'title_tag',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'page_schema',
        'og_code',
        'is_active',
    ];
}
