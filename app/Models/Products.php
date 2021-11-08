<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'content',
        'image_list',
        'category_id',
        'user_id',
        'price',
        'price_sale',
        'quantity',
        'slug',
        'status'
    ];

    public function category()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }
}
