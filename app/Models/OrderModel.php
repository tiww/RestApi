<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'tracking_no',
        'tracking_msg',
        // 'paymenet_mode',
        // 'paymenet_id',
        'payment_status',
        'order_status',
        'cancel_reason',
        'notify',
        'invoice',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function orderitem()
    {
        return $this->hasMany(ServicesOrderModel::class, 'order_id', 'id');
    }
}
