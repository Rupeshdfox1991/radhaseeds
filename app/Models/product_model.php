<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_model extends Model
{
    use HasFactory;

    protected $table = 'product_models';

    protected $primaryKey = 'id';

    protected $fillable = [        
        'pro_cat_id',
        'pro_filt_cat_id',
        'pro_filt_id',
        'pro_series_id',
        'related_product_id',
        'product_name',
        'product_slug',
        'image',
        'alt_tag',
        'title_tag',
        'product_code',
        'product_desc',
        'moc',
        'ofc',
        'weight',
        'design_reg_no',
        'shape',
        'color',
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

    public function categoriesFilterData()
    {
        return $this->hasOne(Product_filter_category::class, 'id', 'pro_filt_cat_id');
    }

    public function productFilterData()
    {
        return $this->hasOne(product_filter::class, 'id', 'pro_filt_id');
    }

    public function productSeriesData()
    {
        return $this->hasOne(product_series::class, 'id', 'pro_series_id');
    }
}