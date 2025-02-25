<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'pro_cat_id',
        'product_name',
        'product_slug',
        'product_code',
        'image',
        'alt_tag',
        'title_tag',
        'product_desc',
        'for_home',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'page_schema',
        'og_code',
        'is_active',
    ];

    public function categoriesData()
    {
        return $this->hasOne(Product_category::class, 'id', 'pro_cat_id');
    }

}