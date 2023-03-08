<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Address;

class BasketController extends Controller
{
    public function addToBasket(Request $request){
        //dd(Order::where('Account_ID', Auth::user()->id)->where('Order_Status', 'Basket')->first()->Order_ID);
    if (!Auth::check()) {
            return redirect('login')->with('loginToAddCart', 'You need to Login to add to Cart');
    }

        $productPrice = Product::where('Product_ID', $request->Product_ID)
        ->value('Product_Price');

          //checks first if address record exists, if it doesnt then make one
                 Address::firstOrCreate([
                'Account_ID' => Auth::user()->id,
                ], [
                'Account_ID' => Auth::user()->id,
                'Address_ID' => Auth::user()->id,
                'ZIP' => "pendin",
                'City' => "pending",
                'Country' => "pending",
                'Street' => "pending",
                'County' => "pending",
                ]);

        // Check if order exists in the database. If so, only increase the Order_Total_Price.
        $basketE = Order::where('Account_ID', Auth::user()->id)
        ->where('Order_Status', 'Basket')
        ->first();

    if (!$basketE) {
        // Create a new order if it doesn't exist
        $order = new Order;
        $order->Account_ID = Auth::user()->id;
        $order->Address_ID = Auth::user()->id;
        $order->Order_Status = 'Basket';
        $order->Order_Total_Price = $productPrice * $request->qty;
        $order->save();
    } else {
        // Update the existing order
        $basketE->increment('Order_Total_Price', $productPrice * $request->qty);
        $basketE->update();
        $order = $basketE;
        }

        // Check if the product already exists in the basket
        $orderItem = OrderItem::where('Order_ID', $order->Order_ID)
        ->where('Product_ID', $request->Product_ID)
        ->first();

    if (!$orderItem) {
            // Add the product to the basket if it doesn't exist
            $orderItem = new OrderItem;
            $orderItem->Product_ID = $request->Product_ID;
            $orderItem->Order_ID = $order->Order_ID;
            $orderItem->Amount = $request->qty;
            $orderItem->Price = $productPrice;
            $orderItem->save();
    } else {
            // Update the quantity of the product in the basket
            $orderItem->increment('Amount', $request->qty);
            $orderItem->update();
    }
    return redirect()->back()->with('addcartmsg', 'Product added to Basket');

    }

    public function showCart()
    {
        if (!auth()->check()) {
            return redirect('login');
        }

        $order = Order::where('Account_ID', auth()->user()->id)
            ->where('Order_Status', 'Basket')
            ->first();

        // if (!$orderItem) {
        //     return view('cart');
        // }

        $products = $order->products;

        return view('cart', [
            'products' => $products,
        ]);
    }

    // public static function basketTotal()
    // {
    // // $totalItems = Order::where('Account_ID', Auth::user()->id)
    // //          ->where('Order_Status', 'Basket')
    // //          ->first()
    // //          ->orderItems()
    // //          ->sum('Amount');

    // $order = Order::where('Account_ID', Auth::user()->id)
    // ->where('Order_Status', 'Basket')
    // ->first();

    // if ($order) {
    // return $order->orderItems()->sum('Amount');
    // }

    // return 0;
    // }

    public function removeBasket($id)
    {
    $order = Order::where('Account_ID', Auth::user()->id)
    ->where('Order_Status', 'Basket')
    ->first();

    $orderItem = OrderItem::where('Order_ID', $order->Order_ID)
    ->where('Product_ID', $id)
    ->first();

   // Subtract the price of the deleted order item from the order's total price
   $order->Order_Total_Price -= $orderItem->Price * $orderItem->Amount;
   $order->save();

   // Delete the order item
   $orderItem->delete();

   return redirect('/cart')->with('rmvcartmsg', "Item Removed");
    }
public function test()
{
//dd(OrderItem::all());

// if (Auth::user()){
//     $productPrice = Product::where('Product_ID', $request->Product_ID)
//     ->value('Product_Price');



//       //checks first if address record exists
//       if(!(Address::where('Account_ID', Auth::user()->id)->exists())){
//       $address = new Address;
//       $address->Address_ID= Auth::user()->id;
//       $address->Account_ID= Auth::user()->id;
//       $address->ZIP= "pendin";
//       $address->City= "pending";
//       $address->Country = "pending";
//       $address->Street = "pending";
//       $address->County = "pending";
//       $address->save();
//    }
//      //check if order exists in the database If so only increase the Order_Total_Price
//      $basketE = Order::where('Account_ID', Auth::user()->id)
//      ->where('Order_Status', "Basket")
//      ->first();

//         if($basketE){
//         //  $c="true";
//         // dd($c);
//         $order = new Order;
//         $basketE->increment('Order_Total_Price', $productPrice * $request->qty);
//         $basketE->update();
//         }else{
//         $order = new Order;
//         $order->Account_ID = Auth::user()->id;
//         $order->Address_ID = Auth::user()->id;
//         $order->Order_Status = "Basket";
//         //$order->Order_Total_Price = $order->Order_Total_Price + ($productPrice * $request->qty);  //remove brackets if it doesnt work , Adding the right Amount
//         $order->Order_Total_Price = $productPrice * $request->qty;
//         $order->save();
//         }

//     $orderItem = new OrderItem;
//     $orderItem->Product_ID = $request->Product_ID;
//     $orderItem->Order_ID = $order->Order_ID;
//     $orderItem->Amount = $request->qty;
//     $orderItem->Price = $productPrice;
//     $orderItem->save();

//     } else{
//         return redirect('login')->with('loginToAddCart', 'You need to Login to add to Cart');

//     }

 }

}
