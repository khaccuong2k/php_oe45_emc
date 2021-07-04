<?php

namespace App\Repositories\Order;

interface OrderRepositoryInterface
{
    /**
     * Change status of order
     * 
     * @var int $id
     * @return boolean
     */
    public function changeStatus(int $id);
}
