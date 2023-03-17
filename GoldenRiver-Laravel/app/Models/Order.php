<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $table = 'orderb';
    protected $primaryKey = 'Order_ID';
    protected $fillable = [
        'Order_ID',
        'Order_Total_Price',
        'Order_Status',
        // Add other fillable fields here
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'linked_product_order', 'Order_ID', 'Product_ID')
            ->withPivot('Amount')
            ->withTimestamps();
    }




    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'Order_ID');
    }

    public static function basketTotal()
    {
    if (Auth::check()) {
        $order = Order::where('Account_ID', Auth::user()->id)
            ->where('Order_Status', 'Basket')
            ->first();

        if ($order) {
            return $order->orderItems()->sum('Amount');
        }
    }
    return 0;
    }
}
