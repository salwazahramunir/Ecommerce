<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use App\Models\OrderDetail;

class Product extends Model
{
    use HasFactory;

    // table associated with the model
    protected $table = 'products';

    // Fillable fields
    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
        'stock',
        'product_category_id'
    ];

    // one-to-many relationship to the product categories table
    public function product_categories()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function order_details() {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
}
