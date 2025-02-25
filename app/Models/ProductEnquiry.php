<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductEnquiry extends Model
{
    use HasFactory;

    protected $table = 'product_enquiries';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'company_name',
        'country',
        'contact_number',
        'products',
        'comments',
        'terms_condition',
        'newsletter',
        'is_active',
    ];
}