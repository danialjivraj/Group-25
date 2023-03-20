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


    public function showOrderSummary($order_id){
        if(Auth::check()){
        $user = Auth::user();
        $order = Order::where('Account_ID', $user->id)
        ->where('Order_ID', $order_id)
        ->where('Order_Status', 'Processing')
        ->first();


        if(!$order){
            return redirect("/product");
        }

        $orderItems = $order->orderItems;
        $address = Address::where('Account_ID', $user->id)->first();

        return view('order-summary')->with([
            'order' => $order,
            'orderItems' => $orderItems,
            'address' => $address,
        ]);
    } else{
        return redirect("/cart")->with('checkouterr', 'An error has occured while checking out');
    }
    }
}
