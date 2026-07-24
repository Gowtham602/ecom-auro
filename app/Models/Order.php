<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

        'user_id',

        'order_no',

        'subtotal',

        'delivery_charge',

        'total',

        'payment_method',

        'payment_status',

        'razorpay_order_id',

        'razorpay_payment_id',

        'razorpay_signature',

        'order_status',

        'address',

        'phone',

    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}