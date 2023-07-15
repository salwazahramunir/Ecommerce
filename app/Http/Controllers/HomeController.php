<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()) { // jika sudah login
            if (auth()->user()->role == 'admin') { // jika role adalah admin
                return redirect('/dashboard');
            } else {
                $order = Order::where([
                    ['user_id', '=', auth()->user()->id],
                    ['status', '=', 'not yet paid off']
                ])->first();
                $products = Product::orderByDesc('created_at')->take(8)->get();

                return view('customer.home', compact('products', 'order'));
            }
        }

        $products = Product::orderByDesc('created_at')->take(8)->get();

        return view('customer.home', compact('products'));
    }
}
