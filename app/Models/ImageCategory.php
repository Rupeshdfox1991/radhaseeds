<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCategory extends Model
{
    use HasFactory;

    protected $table = 'image_categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'alt_tag',
        'title_tag',
        'for_home',
        'is_active',
    ];
}