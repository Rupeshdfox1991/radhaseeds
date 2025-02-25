<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    use HasFactory;

    protected $table = 'image_galleries';
    protected $primaryKey = 'id';

    protected $fillable = [
        'img_cat_id',
        'images',
        'is_active',
    ];

    public function categoriesData()
    {
        return $this->hasOne(ImageCategory::class, 'id', 'img_cat_id');
    }
}