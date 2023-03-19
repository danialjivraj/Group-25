<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Address;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function processCheckout(Request $request){

        $request->validate([
            'Phone_Number' => 'required|regex:/^[0-9]{1,12}$/',
            'Street' => 'required|max:40',
            'City' => 'required|max:40',
            'County' => 'required|max:20',
            'Country' => 'required|max:40',
            'Post_Code' => 'required|max:10',
        ]);

        $user = User::find(Auth::user()->id);
        //dd($user);
        $user->Phone_Number = $request->Phone_Number;
        $user->save();

        //To do: check if Address details already exists.
        $address = Address::find(Auth::user()->id);
        $address->Street = $request->Street;
        $address->City = $request->City;
        $address->County = $request->County;
        $address->Country = $request->Country;
        $address->ZIP = $request->Post_Code;
        $address->save();

        $order_ID = Order::where('Account_ID', auth()->user()->id)
       ->where('Order_Status', 'Basket')
       ->value('Order_ID');

       $order = Order::find($order_ID);
       $order->Order_Status = 'Processing';
       $order->save();

        // Retrieve the order items for the current order
        $orderItems = OrderItem::where('Order_ID', $order->Order_ID)->get();

           // Deduct the ordered quantities from the product stock
        foreach ($orderItems as $item) {
         $product = Product::find($item->Product_ID);
         $product->Amount -= $item->Amount;
         $product->save();
         }

        return view('order-summary')->with([
            'order' => $order,
            'orderItems' => $orderItems,
            'address' => $address,
        ]);
    }
}
