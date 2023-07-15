<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Order;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::where('user_id', '=', auth()->user()->id)->get();
        $order = Order::where([
            ['user_id', '=', auth()->user()->id],
            ['status', '=', 'not yet paid off']
        ])->first();

        return view('customer.address.list', compact('addresses', 'order'));
    }

    public function show(string $id)
    {
        $address = Address::find($id);
        $order = Order::where([
            ['user_id', '=', auth()->user()->id],
            ['status', '=', 'not yet paid off']
        ])->first();
        return view('customer.address.detail', compact('address', 'order'));
    }

    public function create()
    {
        $order = Order::where([
            ['user_id', '=', auth()->user()->id],
            ['status', '=', 'not yet paid off']
        ])->first();

        return view('customer.address.form_create', compact(('order')));
    }

    public function store(Request $request)
    {
        $address = new Address();
        $address->recipient_name = $request->recipient_name;
        $address->recipient_phone_number = $request->recipient_phone_number;
        $address->province = $request->province;
        $address->city = $request->city;
        $address->subdistrict = $request->subdistrict;
        $address->village = $request->village;
        $address->postal_code = $request->postal_code;
        $address->home_address = $request->home_address;
        $address->other_details = $request->other_details;
        $address->user_id = 2;
        $address->save();

        return redirect('addresses');
    }

    public function edit(string $id)
    {
        $address = Address::find($id);
        $order = Order::where([
            ['user_id', '=', auth()->user()->id],
            ['status', '=', 'not yet paid off']
        ])->first();

        return view('customer.address.form_edit', compact('address', 'order'));
    }

    public function update(Request $request, string $id)
    {
        $address = Address::find($id);
        $address->recipient_name = $request->recipient_name;
        $address->recipient_phone_number = $request->recipient_phone_number;
        $address->province = $request->province;
        $address->city = $request->city;
        $address->subdistrict = $request->subdistrict;
        $address->village = $request->village;
        $address->postal_code = $request->postal_code;
        $address->home_address = $request->home_address;
        $address->other_details = $request->other_details;
        $address->user_id = 2;
        $address->save();

        return redirect('addresses');
    }

    public function destroy(string $id)
    {
        $address = Address::find($id);
        $address->delete();

        return redirect('addresses');
    }
}
