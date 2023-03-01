<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    //sorts the products and shows a list
    public function showProducts(Request $request)
    {
        if($request->filter_by_category != null || $request->filter_by_stock != null){
            $prod = Product::where('Category_ID' ,$request->filter_by_category  ?? 0)
            ->where('Amount', '>=',$request->filter_by_stock ?? 0)
            ->get();
        }
        elseif($request->get('sort') == 'price_ascending'){
            $prod = Product::orderBy('Product_Price', 'asc')->get();

        } elseif ($request->get('sort') =='price_descending')
        {
            $prod = Product::orderBy('Product_Price', 'desc')->get();
        }
        elseif ($request->get('sort') =='prod_cat')
        {
            $prod = Product::orderBy('Category_ID', 'asc')->get();
        }
        elseif($request->get('sort') =='popularity'){

            $prod = Product::orderBy('Amount', 'asc')->get();
        }else{
            $prod = Product::all();
        }
        //dd($request->all());
        // $prod = Product::where($request->filter_by_category != null, function ($q) use ($request) {
        //     return $q->where('Category_ID ' ,$request->filter_by_category);
        // })
        // ->where($request->filter_by_stock != null, function ($q) use ($request) {
        //     return $q->where('Amount',$request->filter_by_stock);
        // })->get();
        //dd($filter_Cat);
        return view('product', ['products' => $prod]);
    }

    public function aProduct($Product_ID)
    {
        $aProduct = Product::where('Product_ID', $Product_ID)->first();
        return view('item', ['item' => $aProduct]);
    }

    public function search()
    {
        $search = $_GET['search'];
        if (!empty($search)) {
            $product = Product::where('Product_Name', 'LIKE', '%' . $search . '%')
                ->orWhere('Description', 'LIKE', '%' . $search . '%')
                ->get();
           return view('/search', compact('product'));
        } else {
            return redirect('/product');
        }
    }
}
