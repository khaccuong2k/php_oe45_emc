<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    public function getModel()
    {
        return Order::class;
    }

    public function where($column, $condition)
    {
        return Order::select('id')->where($column, $condition)->get();
    }

    public function with($relationship)
    {
        return Order::with($relationship)->where('user_id', Auth::id())->get();
    }
}
