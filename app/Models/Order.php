<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'order_date', 'payment_method', 'shipping_address'] ;
    public function orderDetails() {
        return $this->hasMany(Order_detail::class, 'order_id', 'id');
    }
}
