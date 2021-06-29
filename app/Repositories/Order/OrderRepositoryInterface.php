<?php

namespace App\Repositories\Order;

interface OrderRepositoryInterface
{
    public function with($relationship);
    
    public function where($column, $condition);
}
