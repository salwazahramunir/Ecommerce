<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Product;

class ProductCategory extends Model
{
    use HasFactory;

    // table associated with the model
    protected $table = 'product_categories';

    // Fillable fields
    protected $fillable = [
        'name'
    ];

    // one-to-many relationship to the products table
    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }
}
