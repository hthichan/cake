<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'product_id',
        'news_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
