<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class OrderDetail extends Model
{
    use HasFactory;

    // table associated with the model
    protected $table = 'order_details';

    // Fillable fields
    protected $fillable = [
        'product_price',
        'quantity',
        'sub_total',
        'order_id',
        'product_id',
    ];

    // one-to-many relationship to the order detail table
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
