<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluate extends Model
{
    use HasFactory;
    protected $fillable = ['rating', 'comment', 'product_id', 'customer_id'];

    public function customer() {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

}
