<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Order;

class ShopController extends Controller
{
    public function index() {
        $products = Product::orderByDesc('created_at')->get();
        $categories = ProductCategory::all();
        $order = Order::where([
            ['user_id', '=', 2],
            ['status', '=', 'not yet paid off']
        ])->first();

        return view('customer.shop.list', compact('products', 'categories', 'order'));
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        $products_by_category = Product::where([
            ['product_category_id', "=", $product->product_category_id],
            ['id', '!=', $id]
        ])->get();
        $order = Order::where([
            ['user_id', '=', 2],
            ['status', '=', 'not yet paid off']
        ])->first();

        return view('customer.shop.show', compact('product', 'products_by_category', 'order'));
    }
}
