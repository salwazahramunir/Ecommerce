<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ShopController extends Controller
{
    public function index() {
        $products = Product::orderByDesc('created_at')->get();
        $categories = ProductCategory::all();

        return view('customer.shop.list', compact('products', 'categories'));
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        $products_by_category = Product::where([
            ['product_category_id', "=", $product->product_category_id],
            ['id', '!=', $id]
        ])->get();

        return view('customer.shop.show', compact('product', 'products_by_category'));
    }
}
