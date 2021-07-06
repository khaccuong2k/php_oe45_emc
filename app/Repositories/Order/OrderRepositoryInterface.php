<?php

namespace App\Repositories\Order;

interface OrderRepositoryInterface
{
    public function with($relationship);
    
    public function where($column, $condition);

    /**
     * Change status of order
     *
     * @var int $id
     * @return boolean
     */
    public function changeStatus(int $id);
}
