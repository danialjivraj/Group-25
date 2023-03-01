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
        if (Auth::user()){
        $productPrice = Product::where('Product_ID', $request->Product_ID)
        ->value('Product_Price');

          //checks first if address record exists, if it doesnt then make one
                 Address::firstOrCreate([
                'Account_ID' => Auth::user()->id,
                ], [
                'Address_ID' => Auth::user()->id,
                'ZIP' => "pendin",
                'City' => "pending",
                'Country' => "pending",
                'Street' => "pending",
                'County' => "pending",
                ]);

         //check if order exists in the database If so only increase the Order_Total_Price
         $basketE = Order::where('Account_ID', Auth::user()->id)
         ->where('Order_Status', "Basket")
         ->first();

         $user = Order::updateOrCreate([
            'Account_ID' => Auth::user()->id,
            'Order_Status'=> "Basket",
        ], [
            'Order_Total_Price' => Order::where('Account_ID', Auth::user()->id)->sum('Order_Total_Price') + $productPrice * $request->qty,
        ]);

        $orderItem = new OrderItem;
        $orderItem->Product_ID = $request->Product_ID;
        $orderItem->Order_ID = Order::where('Account_ID', Auth::user()->id)->where('Order_Status', 'Basket')->first()->Order_ID;
        $orderItem->Amount = $request->qty;
        $orderItem->Price = $productPrice;
        $orderItem->save();

        } else{
            return redirect('login')->with('loginToAddCart', 'You need to Login to add to Cart');

        }
    }

    public function listBasket (){
        if (Auth::user()){
            $userID = Auth::user()->id;
            $data = Order::where('AccountID', $userID)
            ->where('Order_Status', 'Basket')
            ->get();

            return $data;
    }
}

public function removeBasket($id)
{
    OrderItem::where('Product_ID', $id)->delete();
    return redirect('/cart')->with('msg', "Item Removed");
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
