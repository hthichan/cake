<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_item extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'cart_id', 'quantity'];
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
