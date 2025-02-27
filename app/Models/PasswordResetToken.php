<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'token'];

    public function user() {
        return $this->hasOne(Customer::class, 'email', 'email');
    }

    public function scopeCheckToken($q, $token) {
        return $q
        ->where('token','=', $token)
        ->firstOrFail();
    }
    public function scopeDeleteToken($q, $token) {
        return $q
        ->where('token','=', $token)
        ->delete();
    }
}
