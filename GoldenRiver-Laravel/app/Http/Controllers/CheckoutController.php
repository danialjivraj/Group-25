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
    public function processCheckout(Request $request)
    {

        $request->validate([
            'Phone_Number' => ['required', 'regex:/^(\+44|0)7\d{9}$/'],
            'Street' => 'required|max:40|regex:/^[a-zA-Z0-9\s]+$/',
            'City' => 'required|max:40|regex:/^[a-zA-Z\s]+$/',
            'County' => 'required|max:20|regex:/^[a-zA-Z\s]+$/',
            'Country' => 'required|max:40|regex:/^[a-zA-Z\s]+$/',
            'Post_Code' => 'required|max:10|regex:/^[A-Z]{1,2}[0-9R][0-9A-Z]? [0-9][ABD-HJLNP-UW-Z]{2}$/i',
        ]);


        $user = User::find(Auth::user()->id);
        $user->Phone_Number = $request->Phone_Number;
        $user->save();

        // Get or create the user's address
        Address::updateOrCreate(
            ['Account_ID' => $user->id],
            [
                'Street' => $request->Street,
                'City' => $request->City,
                'County' => $request->County,
                'Country' => $request->Country,
                'ZIP' => $request->Post_Code,
                'Phone_Number' => $request->Phone_Number,
            ]
        );
        $order = Order::where('Account_ID', auth()->user()->id)
            ->where('Order_Status', 'Basket')
            ->first();

        $order->Order_Status = 'Processing';
        $order->save();

        // Retrieve the order items for the current order
        $orderItems = $order->orderItems;

        // Deduct the ordered quantities from the product stock
        foreach ($orderItems as $item) {
            $product = Product::find($item->Product_ID);
            $product->Amount -= $item->Amount;
            $product->save();
        }

        return redirect()->route('order-summary', ['order_id' => $order->Order_ID]);
    }


    public function showOrderSummary($order_id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $order = Order::where('Account_ID', $user->id)
                ->where('Order_ID', $order_id)
                ->where('Order_Status', 'Processing')
                ->first();

            if (!$order) {
                return redirect("/product");
            }

            $orderItems = $order->orderItems;
            $address = Address::where('Account_ID', $user->id)->first();
            
            $shippingCost = config('shipping.shipping_cost');

            return view('order-summary')->with([
                'order' => $order,
                'orderItems' => $orderItems,
                'address' => $address,
                'user' => $user,
                'shippingCost' => $shippingCost,
            ]);
        } else {
            return redirect("/cart")->with('checkouterr', 'An error has occurred while checking out');
        }
    }
}
