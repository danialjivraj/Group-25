<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $primaryKey = 'POL_ID';
    protected $table = 'linked_product_order';
    protected $fillable = [
        'Order_ID',
        'Product_ID',
        'Amount',
        'Price',
    ];

    public function order()
    {
        //return $this->belongsTo(Order::class);
        return $this->belongsTo(Order::class, 'Order_ID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'Product_ID');
    }


    public function linkedProduct()
    {
        return $this->hasMany(Product::class, 'Product_ID');
    }
}
