<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepository;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    /**
     * @var const CHANGE_STATUS_ORDER_TO_NEST_STEP
     */
    private const CHANGE_STATUS_ORDER_TO_NEST_STEP = 1;

    public function getModel()
    {
        return Order::class;
    }

    public function all()
    {
        $orders = $this->model::with('user')->get();

        return $orders;
    }

    public function findOrFail($id)
    {
        $find = $this->findOrFail($id);
        if ($find) {
            $detaiOrder = $this->model::with('orderDetail.product')->find($id);

            return $detaiOrder;
        }

        return false;
    }

    public function changeStatus($id)
    {
        $find = $this->findOrFail($id);
        if ($find) {
            $find->update(['status' => $find->status + self::CHANGE_STATUS_ORDER_TO_NEST_STEP]);

            return true;
        }

        return false;
    }
}
