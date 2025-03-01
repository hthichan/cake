<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'promotion_id',
        'name',
        'description',
        'price',
    ];

    public function image()
    {
        return $this->hasOne(Image::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function promotion()
    {
        return $this->hasOne(Promotions::class, 'id', 'promotion_id');
    }
    public function evaluates()
    {
        return $this->hasMany(Evaluate::class, 'product_id', 'id');
    }

    protected function promotionalPrice(): Attribute
    {
        if (!is_null($this->promotion)) {
            $promotionalPrice = $this->price / 100 * (100 - $this->promotion->discount_percentage);
        } else {
            $promotionalPrice = $this->price;
        }
        return Attribute::make(
            get: fn() => $promotionalPrice,
        );
    }
    protected function prodName(): Attribute
    {
        return Attribute::make(
            get: fn() => ucfirst(mb_strtolower($this->name, 'UTF-8')),
        );
    }

    public function reviews() {
        return $this->hasMany(Evaluate::class, 'product_id', 'id');
    }
}