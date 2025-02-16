<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;

class Promotions extends Model
{
    use HasFactory;
    use Prunable;
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'discount_percentage'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    public function prunable()
    {
        $promotions = static::where('end_date', '<', now())->get();
        foreach ($promotions as $promotion) {
            $promotion->products()->update(['promotion_id' => null]);
        }
        return static::where('end_date', '<', now());
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'promotion_id', 'id');
    }
}
