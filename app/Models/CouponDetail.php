<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponDetail extends Model
{
    use HasFactory;

    protected $table = "coupon_detail";

    protected $fillable = [
        'coupon_id',
        'user_id',
    ];
}
