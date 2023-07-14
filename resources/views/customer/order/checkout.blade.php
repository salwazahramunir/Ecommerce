@extends('customer.layout.app_customer')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="{{ route('checkouts.store', $order->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="checkout__order">
                                <h6 class="order__title">Shipping Address</h6>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p class="mt-1">Select Address <span>*</span></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input float-right">
                                            <select name="address_id" id="">
                                                @foreach($addresses as $row)
                                                <option value="{{ $row->id }}">{{ $row->recipient_name }} - {{ $row->home_address }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="table table-stripped">
                                <table width="100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_details as $row)
                                            <tr class="text-center">
                                                <td class="product__cart__item">
                                                    <div class="product__cart__item__pic">
                                                        <img src="{{ $row->product->image }}" width="150px" alt="{{ $row->product->name }}">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="product__cart__item__text">
                                                        <h6 class="mt-5">{{ $row->product->name }}</h6>
                                                        <h5>Rp. {{ number_format($row->product->price) }}</h5>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="mt-5">{{ $row->quantity }}</p>
                                                </td>
                                                <td class="mt-5" >
                                                    <p class="mt-5">Rp. {{ number_format($row->sub_total) }}</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr class="text-center">
                                            <td colspan="2"></td>
                                            <td>Product Subtotal</td>
                                            <td>Rp. {{ number_format($order->total_price) }}</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td colspan="2"></td>
                                            <td>Service Fee</td>
                                            <td>Rp. {{ number_format($order->total_price * 0.11 ) }}</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td colspan="2"></td>
                                            <td><b>Total Payment</b></td>
                                            <td><b>Rp. {{ number_format($order->total_price + ($order->total_price * 0.11 )) }}</b></td>
                                        </tr>
                                        <tr class="text-center">
                                            <td colspan="3"></td>
                                            <td>
                                                <button class="btn btn-primary mt-3">Complete the Order</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection