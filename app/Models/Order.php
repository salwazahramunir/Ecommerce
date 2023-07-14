<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\OrderDetail;

class Order extends Model
{
    use HasFactory;

    // table associated with the model
    protected $table = 'orders';

    // Fillable fields
    protected $fillable = [
        'invoice',
        'total_price',
        'date',
        'status',
        'user_id',
        'address_id'
    ];

    // one-to-many relationship to the order details table
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
