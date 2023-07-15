@extends('customer.layout.app_customer')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Address Detail</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('addresses') }}">Addresses</a>
                        <span>Detail</span>
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
                            <tr>
                                <th>Recipient Name</th>
                                <th>:</th>
                                <td>{{ $address->recipient_name }}</td>
                            </tr>
                            <tr>
                                <th>Recipient Phone Number</th>
                                <th>:</th>
                                <td>{{ $address->recipient_phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Province</th>
                                <th>:</th>
                                <td>{{ $address->province }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <th>:</th>
                                <td>{{ $address->city }}</td>
                            </tr>
                            <tr>
                                <th>Subdistrict</th>
                                <th>:</th>
                                <td>{{ $address->subdistrict }}</td>
                            </tr>
                            <tr>
                                <th>Village</th>
                                <th>:</th>
                                <td>{{ $address->village }}</td>
                            </tr>
                            <tr>
                                <th>Postal Code</th>
                                <th>:</th>
                                <td>{{ $address->postal_code }}</td>
                            </tr>
                            <tr>
                                <th>Home Address</th>
                                <th>:</th>
                                <td>{{ $address->home_address }}</td>
                            </tr>
                            <tr>
                                <th>Other Detail</th>
                                <th>:</th>
                                <td>{{ $address->other_details }}</td>
                            </tr>
                        </table>
                    </div>
                    <a href="{{ route('addresses') }}" class="btn primary-btn">Back</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection