<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'for_home',
        'image_thumb',
        'image_thumb_title_tag',
        'image_thumb_alt_tag',
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

    public function userData()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}