@extends('admin.layout.app_admin')
@section('content')
<div class="container my-5">
    <h2>Detail Product</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products') }}">Product List</a></li>
        <li class="breadcrumb-item active">{{ $product->name }}</li>
    </ol>
    <div class="card my-4 px-4 py-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ $product->image }}" width="100%" alt="{{ $product->name }}">
                </div>
                <div class="col-md-7 py-3">
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <tr>
                                <th>Name</th>
                                <th>:</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <th>:</th>
                                <td>Rp. {{ $product->price }}</td>
                            </tr>
                            <tr>
                                <th>Stock</th>
                                <th>:</th>
                                <td>{{ $product->stock }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <th>:</th>
                                <td>{{ $product->product_categories->name }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <th>:</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                        </table>
                    </div>
                    <!-- <h2>{{ $product->name }}</h2>
                    <h4>Rp. {{ $product->price }}</h4>

                    <p class="mt-5 mb-4">{{ $product->description }}</p>
                    <hr> -->
                </div>
            </div>
            <a href="{{ route('products') }}" class="btn btn-outline-primary mt-4">Back</a>
        </div>
    </div>
</div>
@endsection