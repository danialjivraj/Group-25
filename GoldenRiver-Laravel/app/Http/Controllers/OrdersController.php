<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;


class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('Account_ID', auth()->id())
            ->where('Order_Status', '!=', 'basket')
            ->get();

        return view('profile', ['orders' => $orders]);
    }

    public function show($id)
    {
        $order = Order::with('orderItems.product')->where('Order_ID', $id)->where('Account_ID', auth()->id())->firstOrFail();
        
        $orderItems = $order->orderItems;
        
        return view('orders.show', compact('order', 'orderItems'));
    }
    
    
}
