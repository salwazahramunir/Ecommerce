@extends('admin.layout.app_admin')
@section('content')
<div class="container my-5">
    <h2>Product List</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Product List</li>
    </ol>
    <hr>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-4">Create New Data</a>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($products as $row)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->price }}</td>
                            <td>{{ $row->stock }}</td>
                            <td>{{ $row->product_categories->name }}</td>
                            <td>
                                <a href="{{ route('products.edit', $row->id) }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <a href="{{ route('products.show', $row->id) }}" class="btn btn-info btn-sm">
                                    Detail
                                </a>
                                <form action="{{ route('products.destroy', $row->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete {{ $row->name }} data ?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @php $no++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection