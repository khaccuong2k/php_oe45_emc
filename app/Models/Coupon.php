<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_day',
        'end_day',
        'percent_discount',
        'quantity',
    ];

    public function couponDetail()
    {
        return $this->hasMany(CouponDetail::class);
    }

    public function users()
    {
        return $this->hasManyThrough(
            CouponDetail::class,
            User::class
        );
    }
}
