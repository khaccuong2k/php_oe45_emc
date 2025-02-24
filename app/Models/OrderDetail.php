<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = "order_detail";

    protected $fillable = [
        'order_id',
        'product_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
