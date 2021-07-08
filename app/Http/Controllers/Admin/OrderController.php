<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    /**
    *
    * @var $orderRepository
    */
    protected $orderRepository;

    /**
     *
     * @var OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $orders = $this->orderRepository->all();
        } catch (QueryException $exception) {
            return back()->withError('message.select_data.fail');
        }
        
        if ($orders) {
            return view('admin.order.index', compact('orders'));
        }

        return back()->withError('message.select_data.fail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $detailOrder = $this->orderRepository->findOrFail($id);
        } catch (QueryException $exception) {
            return back()->withError('message.select_data.fail');
        }
        
        if ($detailOrder) {
            return view('admin.order.detail', compact('detailOrder'));
        }

        return back()->withError('message.select_data.fail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus($id)
    {
        try {
            $changeStatus = $this->orderRepository->changeStatus($id);
        } catch (QueryException $exception) {
            return response()->json(
                [
                    'success' => false,
                    'message' => trans('message.change_status.fail'),
                ]
            );
        }

        if ($changeStatus) {
            return response()->json(
                [
                    'success' => true,
                    'message' => trans('lable.order_confirmation'),
                ]
            );
        }
        
        return response()->json(
            [
                'success' => false,
                'message' => trans('message.change_status.fail'),
            ]
        );
    }
}
