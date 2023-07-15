@extends('customer.layout.app_customer')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Addresses</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}">Home</a>
                        <span>Addresses</span>
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
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <a href="{{ route('addresses.create') }}" class="btn btn-primary btn-sm mb-4">Add New Address</a>
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Recipient Name</th>
                                    <th>Recipient phone number</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($addresses)
                                    @php $no = 1 @endphp
                                    @foreach ($addresses as $row)
                                        <tr>
                                            <td>{{ $no}}</td>
                                            <td>{{ $row->recipient_name }}</td>
                                            <td>{{ $row->recipient_phone_number }}</td>
                                            <td>
                                                <a href="{{ route('addresses.edit', $row->id) }}" class="btn btn-warning btn-sm">
                                                    Edit
                                                </a>
                                                <a href="{{ route('addresses.show', $row->id) }}" class="btn btn-info btn-sm">
                                                    Detail
                                                </a>
                                                <form action="{{ route('addresses.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete address with recipient : {{ $row->recipient_name }}?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php $no++ @endphp
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection
