<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = [
        'category_id',
        'name_p',
        'images_p',
        'price_p',
        'desc_p',
        'status'
    ];

    public function categories()
    {
        return $this->belongsTo(categoryModel::class, 'category_id', 'id');
    }
}
