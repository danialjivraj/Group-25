<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Address;
use App\Models\User;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function processCheckout(Request $request){
        // //To do: check if the Phone_Number already exists.
        // $user = User::find(auth()->user()->id);
        // $user->Phone_Number = $request->Phone_Number;

        // //To do: check if Address details already exists.
        // $address = Address::find(auth()->user()->id);
        // $address->Street = $request->Street;
        // $address->City = $request->City;
        // $address->County = $request->County;
        // $address->Country = $request->Country;
        // $address->ZIP = $request->Post_Code;

        $order_ID = Order::where('Account_ID', auth()->user()->id)
       ->where('Order_Status', 'Basket')
       ->value('Order_ID');

       $order = Order::find($order_ID);
       $order->Order_Status = 'Processing';
       $order->save();

        // Retrieve the order items for the current order
        $orderItems = OrderItem::where('Order_ID', $order->Order_ID)->get();

        return view('order-summary')->with([
            'order' => $order,
            'orderItems' => $orderItems,
        ]);
    }
}
