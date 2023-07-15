 <!-- Header Section Begin -->
 <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header__top__inner">

                            <div class="header__logo">
                                <a href="./index.html"><img src="{{ asset('customer/img/logo.png') }}" alt=""></a>
                            </div>
                            <div class="header__top__left">
                                @if(auth()->user())
                                <div class="header__top__right__cart">
                                    <a href="{{ route('carts', 2) }}"><img src="{{ asset('customer/img/icon/cart.png') }}" alt=""> <span>0</span></a>
                                    @if($order)
                                        <div class="cart__price">Cart: <span>Rp. {{ number_format($order->total_price) }}</span></div>
                                    @else
                                        <div class="cart__price">Cart: <span>Rp. 0</span></div>
                                    @endif
                                    <p style="display: inline" class="cart__price mx-2">|</p>
                                    <a class="cart__price" style="color:black" href="{{ route('addresses') }}">Address</a>
                                </div>
                                @else
                                <div class="header__top__left">
                                    <ul>
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="{{ Request::route()->getName() == 'home' ? ' active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                            <li class="{{ Request::route()->getName() == 'shops' ? ' active' : '' }}"><a href="{{ route('shops') }}">Shop</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
