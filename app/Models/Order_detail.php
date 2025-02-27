<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'order_id', 'quantity'] ;

    public function product() {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    protected function price() : Attribute {
        $price = $this->product->promotionalPrice * $this->quantity;

        return Attribute::make(
            get: fn() => $price,
        );
    }
}
