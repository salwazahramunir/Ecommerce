<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Address;

class OrderController extends Controller
{
    public function cart(string $user_id) {
        $order = Order::where([
            ['user_id', '=', 2],
            ['status', '=', 'not yet paid off']
        ])->first();

        if($order) {
            $order_details = OrderDetail::where('order_id', "=", $order->id)->get();
    
            return view('customer.order.cart', compact('order', 'order_details'));
        } else {
            return view('customer.order.cart', compact('order'));
        }
    }

    public function storeOrder(Request $request) {
        // start transaction
        DB::beginTransaction();

        try {
            // If the logged in user has the status "not yet paid off'" in the order table
            $checkOrderStatus = Order::where([
                ['user_id', '=', 2],
                ['status', '=', 'not yet paid off']
            ])->first(); 
    
            if(!$checkOrderStatus) { // when there isn't
                // create new order data
                $order = new Order();
                $order->invoice = "INV-0001";
                $order->total_price = 0;
                $order->date = Carbon::now();
                $order->status = "not yet paid off"; 
                $order->user_id = 2; 
                $order->address_id = 1; 
                $order->save();

                $checkOrderStatus = Order::where([
                    ['user_id', '=', 2],
                    ['status', '=', 'not yet paid off']
                ])->first(); 
            }
    
            $find_product = Product::find($request->product_id);
            
            // Check stock is still available or not
            if($request->quantity > $find_product->stock) {
                throw new \Exception("STOCK TIDAK MENCUKUPI");
            } else {
                $check_avaiable_product_in_order_detail = OrderDetail::where([
                    ['order_id', '=', $checkOrderStatus->id],
                    ['product_id', '=', $request->product_id]
                ])->first(); 

                if($check_avaiable_product_in_order_detail) { // If there are
                    // update order detail by product id
                    $check_avaiable_product_in_order_detail->quantity += $request->quantity;
                    $check_avaiable_product_in_order_detail->sub_total += $check_avaiable_product_in_order_detail->product_price * $request->quantity;
                    $check_avaiable_product_in_order_detail->save();
                } else { // if not there
                    // create new order detail
                    $order_detail = new OrderDetail();
                    $order_detail->product_price = $find_product->price;
                    $order_detail->quantity = $request->quantity;
                    $order_detail->sub_total = $request->quantity * $find_product->price;
                    $order_detail->order_id = $checkOrderStatus->id;
                    $order_detail->product_id = $request->product_id;
                    $order_detail->save();
                }

                // update stock product
                $find_product->stock = $find_product->stock - $request->quantity;
                $find_product->save();

                // update total price order
                $get_order_detail_by_order_id = OrderDetail::where('order_id', '=', $checkOrderStatus->id)->get();
                $temp_sub_total = 0;
                foreach ($get_order_detail_by_order_id as $obj) {
                    $temp_sub_total += $obj->sub_total;
                }
                $checkOrderStatus->total_price = $temp_sub_total;
                $checkOrderStatus->save();
            }
            DB::commit();

            return redirect('shops');
        } catch (\Exception $e) {
            DB::rollback();
            return $e;
            return redirect()->back();
        }
    }

    public function deleteOrderDetail(string $product_id) {
        DB::beginTransaction();

        try {
            // find order detail
            $order_detail = OrderDetail::where('product_id', '=', $product_id)->first();
            $order_id = $order_detail->order_id;
            // delete order detail
            $order_detail->delete();

            // find order
            $find_order = Order::find($order_id);
            // update total price order
            $find_order->total_price -= $order_detail->sub_total;
            $find_order->save();

            // delete order if order detail not found
            if($find_order->total_price === 0) {
                $find_order->delete();
            }
  
            // find product
            $find_product = Product::find($product_id);
            // update stock produk
            $find_product->stock += $order_detail->quantity;
            $find_product->save();

            DB::commit();

            return redirect('carts/2');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back();
        }
    }

    public function checkout(string $order_id) {
        $order_details = OrderDetail::where('order_id', "=", $order_id)->get();
        $addresses = Address::where('user_id', '=', 2)->get();
        $order = Order::find($order_id);

        return view('customer.order.checkout', compact('order_details', 'addresses', 'order'));
    }

    public function checkoutStore(Request $request, string $order_id){
        $find_order = Order::find($order_id);
        $find_order->status = "paid off";
        $find_order->address_id = $request->address_id;
        $find_order->save();

        return redirect('/');
    }
}
