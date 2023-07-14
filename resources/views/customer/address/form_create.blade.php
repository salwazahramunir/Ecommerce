@extends('customer.layout.app_customer')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Create New Address</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('addresses') }}">Addresses</a>
                        <span>Create New Address</span>
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
                <form action="{{ route('addresses.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Recipient Name <span>*</span></p>
                                        <input type="text" name="recipient_name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Recipient Phone Number <span>*</span></p>
                                        <input type="text" name="recipient_phone_number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Province <span>*</span></p>
                                        <input type="text" name="province">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>City <span>*</span></p>
                                        <input type="text" name="city">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Subdistrict <span>*</span></p>
                                        <input type="text" name="subdistrict">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Village <span>*</span></p>
                                        <input type="text" name="village">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Postal Code <span>*</span></p>
                                        <input type="text" name="postal_code">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Home Address <span>*</span></p>
                                        <input type="text" name="home_address">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Other Detail <span>*</span></p>
                                <textarea class="form-control" name="other_details" cols="30" rows="5"></textarea>
                            </div>
                            <div class="mt-5">
                                <a href="{{ route('addresses') }}" class="btn btn-outline-primary">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Create</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection