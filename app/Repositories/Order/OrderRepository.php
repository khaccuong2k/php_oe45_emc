<?php

namespace App\Repositories\Order;

use App\Jobs\ProcessSendMailOrder;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Repositories\BaseRepository;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    /**
     *
     * @var const CHANGE_STATUS_ORDER_TO_NEST_STEP
     */
    private const CHANGE_STATUS_ORDER_TO_NEST_STEP = 1;

    /**
     *
     * @var const CHANGE_STATUS_ORDER_TO_NEST_STEP
     */
    private const STATUS_OF_ORDER_ON_DELIVERY = 2;

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

    public function all()
    {
        $orders = $this->model::with('user')->get();

        return $orders;
    }

    public function findOrFail($id)
    {
        $find = $this->model::findOrFail($id);
        if ($find) {
            $detaiOrder = $this->model::with('orderDetail.product')->find($id);
            
            return $detaiOrder;
        }

        return false;
    }

    public function changeStatus($id)
    {
        $find = $this->model::findOrFail($id);
        if ($find) {
            $find->update(['status' => $find->status + self::CHANGE_STATUS_ORDER_TO_NEST_STEP]);

            $statusOfOrder = trans('lable.order_confirmation');

            if ($find->status === self::STATUS_OF_ORDER_ON_DELIVERY) {
                $statusOfOrder = trans('lable.delivery');
            }

            $inforOrder = $find->user()->first();

            $messageForSendMail = [
                'user' => $inforOrder->fullname,
                'statusOfOrder' => $statusOfOrder,
            ];

            ProcessSendMailOrder::dispatch($messageForSendMail, $inforOrder);

            return true;
        }

        return false;
    }
}
