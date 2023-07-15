@extends('admin.layout.app_admin')
@section('content')
<div class="container my-5">
    <h2>Create New Product</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products') }}">Product List</a></li>
        <li class="breadcrumb-item active">Create New Product</li>
    </ol>
    <div class="card my-4 px-4 py-3">
        <div class="card-body">
            <form method="POST" action="{{ route('products.store') }}" autocomplete="off">
                @csrf
                <div class="row mb-2">
                    <label for="name" class="form-label px-0">Product Name</label>
                    <input type="text" name="name" class="form-control" id="name" autofocus>
                </div>
                <div class="row mb-2">
                    <label for="price" class="form-label px-0">Price</label>
                    <input type="number" name="price" class="form-control" id="price">
                </div>
                <div class="row mb-2">
                    <label for="image" class="form-label px-0">Image</label>
                    <input type="text" name="image" class="form-control" id="image">
                </div>
                <div class="row mb-2">
                    <label for="stock" class="form-label px-0">Stock</label>
                    <input type="number" name="stock" class="form-control" id="stock">
                </div>
                <div class="row mb-2">
                    <label for="product_category_id" class="form-label px-0">Category</label>
                    <select name="product_category_id" id="product_category_id" class="form-select">
                        <option selected disabled>--- Select One ---</option>
                        @foreach ($product_categories as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row mb-2">
                    <label for="description" class="form-label px-0">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                </div>

                <div class="row">
                    <div class="my-3 px-0">
                        <a href="{{ route('products') }}" class="btn btn-outline-primary float-start">Back</a>
                        <button type="submit" class="btn btn-primary float-end">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection