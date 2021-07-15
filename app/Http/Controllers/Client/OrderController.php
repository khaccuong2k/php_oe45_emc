<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    protected $userRepo;
    protected $orderRepo;

    public function __construct(UserRepositoryInterface $userRepo, OrderRepositoryInterface $orderRepo)
    {
        $this->userRepo = $userRepo;
        $this->orderRepo = $orderRepo;
    }

    public function show()
    {
        if (Auth::check()) {
            if (Session::has('cart')) {
                // Get all id product current user added to cart
                $productsIdAdded = Session::get('cart');
                // Broken it to array as id_product => number_added
                $brokenProductAndQuantity = array_count_values($productsIdAdded);
                // Handing data and return all id product and all id product => number_added
                $cartData = handingProductAndQuantity($brokenProductAndQuantity);
                $listIdProductsCart = $cartData['item'];
                // Get all product added to cart
                $productsCart = Product::whereIn('id', $listIdProductsCart)->paginate(config('showitem.cart_item'));
                
                return view('client.orders.confirmOrder', compact('productsCart', 'brokenProductAndQuantity'));
            }

            return view('client.carts.cart');
        }

        return redirect()->route('login')->with('error', 'message.must_login_to_order');
    }

    public function handleOrder(Request $request)
    {
        $productInCart = Session::get('cart');
        // Broken it to array as id_product => number_added
        $brokenProductAndQuantity = array_count_values($productInCart);
        // Handing data and return all id product and all id product => number_added
        $cartData = handingProductAndQuantity($brokenProductAndQuantity);
        $listIdProductsCart = $cartData['item'];

        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->type_payment = config('showitem.type_payment.on_delivery');
        $order->status = config('showitem.status_order.pending');
        $order->save();
    
        $orderProducts = [];
        foreach ($listIdProductsCart as $productId) {
            $orderProducts[] = [
                'order_id' => $order->id,
                'product_id' => $productId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        OrderDetail::insert($orderProducts);
        Session::put('cart', null);
        Session::put('cart-item-number', config('showitem.cart.zero'));
        return redirect()->route('client.order.success');
    }

    public function orderHistory()
    {
        if (Auth::check()) {
            $currentUser = $this->userRepo->findOrFail(Auth::id());
            $orderData = $this->orderRepo->with('user');
            
            return view('client.orders.history', compact('currentUser', 'orderData'));
        }

        return back()->with('message.not_authorize');
    }

    public function orderSuccess()
    {
        return view('client.orders.success');
    }

    public function confirmOrder($id)
    {
        if (Auth::check()) {
            $foundOrder = $this->orderRepo->findOrFail($id);
            if (Auth::id() == $foundOrder->user_id) {
                $confirmOrder = $this->orderRepo->update(
                    $id,
                    ['status' => config('showitem.order_status.received')]
                );
                if ($confirmOrder) {
                    return back()->with('success', 'message.received');
                }
                return back()->with('error', 'message.update_fail');
            }
            return back()->with('error', 'message.not_authorize');
        }
        return redirect()->route('login')->with('error', 'message.must_login');
    }
}
