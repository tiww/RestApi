<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreatmentModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'treatment_id';
    protected $table = 'treatment';
    protected $fillable = [
        'category_id',
        'name_t',
        'images_t',
        'price_t',
        'description_t',
        'status',
    ];

    public function categories()
    {
        return $this->belongsTo(categoryModel::class, 'category_id', 'id');
    }
}
