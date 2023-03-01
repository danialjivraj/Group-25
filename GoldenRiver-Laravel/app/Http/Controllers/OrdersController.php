<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('Account_ID', auth()->id())
            ->where('Order_Status', '!=', 'basket')
            ->get();
        
        $products = \App\Models\Product::all(); // add this line to retrieve all products
    
        return view('profile', ['orders' => $orders, 'products' => $products]);
    }
    
    
    
    public function show($id)
    {
        $order = Order::with('orderItems.product')->where('Order_ID', $id)->where('Account_ID', auth()->id())->firstOrFail();
        
        $orderItems = $order->orderItems;
        $orderStatus = $order->Order_Status; // add this line to retrieve the order status
        
        return view('orders.show', compact('order', 'orderItems', 'orderStatus'));

    }
    
}
