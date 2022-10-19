<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesOrderModel extends Model
{
    use HasFactory;

    protected $table = 'order_services';
    protected $fillable = [
        'order_id',
        'treatment_id',
        'price',
        'quantity',
    ];

    public function treatment()
    {
        return $this->belongsTo(TreatmentModel::class, 'treatment_id', 'treatment_id');
    }
}
