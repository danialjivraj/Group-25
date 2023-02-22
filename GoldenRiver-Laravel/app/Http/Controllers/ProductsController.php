<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function showProducts()
    {
        $prod = Product::all();
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
