<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    
    

}
