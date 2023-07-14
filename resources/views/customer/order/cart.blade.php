@extends('customer.layout.app_customer')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Shopping cart</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($order) 
                                    @foreach ($order_details as $row)
                                        <tr>
                                            <td class="product__cart__item">
                                                <div class="product__cart__item__pic">
                                                    <img src="{{ $row->product->image }}" width="150px" alt="{{ $row->product->name }}">
                                                </div>
                                                <div class="product__cart__item__text">
                                                    <h6>{{ $row->product->name }}</h6>
                                                    <h5>Rp. {{ number_format($row->product->price) }}</h5>
                                                </div>
                                            </td>
                                            <td class="quantity__item">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" value="{{ $row->quantity }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__price">Rp. {{ number_format($row->sub_total) }}</td>
                                            <form action="{{ route('carts.destroy',$row->product_id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td class="cart__close">
                                                <button type="submit" style="border-radius: 150px;border: none" onclick="return confirm('Are you sure you want to delete {{ $row->product->name }} data ?')"><span class="icon_close"></span></button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <b>There are no products yet</b>
                                            <br>
                                            <a href="{{ route('shops') }}" class="primary-btn btn-sm mt-4">Shop Now</a>
                                        </td>
                                    </tr>
                                    
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            @if($order)
                                <li>Subtotal <span>Rp. {{ number_format($order->total_price) }}</span></li>
                                <li>Service Fee <span>Rp. {{ number_format($order->total_price * 0.11) }}</span></li>
                                <li>Total <span>Rp. {{ number_format($order->total_price + ($order->total_price * 0.11 )) }}</span></li>
                            @else
                                <li>Subtotal <span>Rp. 0</span></li>
                                <li>Service Fee <span>Rp. 0</span></li>
                                <li>Total <span>Rp. 0</span></li>    
                            @endif

                        </ul>
                        @if($order)
                        <a href="{{ route('checkouts', $order->id )}}" class="primary-btn">Proceed to checkout</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
    @endsection
