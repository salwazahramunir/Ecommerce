@extends('admin.layout.app_admin')
@section('content')
<div class="container my-5">
    <h2>Product Category List</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Product Category List</li>
    </ol>
    <hr>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#form-product-categories">
        Create New Data
    </button>
    <div class="card mb-4">
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($product_categories as $row)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $row->name }}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit_product_category" onclick="editEvent('{{ $row->id }}')">
                                    Edit
                                </button>
                                <form action="{{ route('product-categories.destroy', $row->id) }}" method="POST">
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

    <!-- Modal Create -->
    <div class="modal fade" id="form-product-categories" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Product Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('product-categories.store') }}" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" autofocus>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Update -->
    <div class="modal fade" id="edit_product_category" tabindex="-1" role="dialog" aria-labelledby="edit_product_category-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Product Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="" action="" autocomplete="off" onsubmit="updateEvent()">
                    @csrf
                    <div class="modal-body">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name-edit" autofocus>
                    </div>
                    <input type="hidden" id="id-edit">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // events to handle edits
    async function editEvent(id) {
        const response = await fetch('http://127.0.0.1:8000/product-categories/' + id + '/edit');
        const jsonData = await response.json();
        
        document.getElementById("name-edit").value = jsonData.name;
        document.getElementById("id-edit").value = jsonData.id;
    }

    // event to handle the update
    async function updateEvent() {
        const id = document.getElementById("id-edit").value;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const requestOptions = {
            method: 'PUT',
            headers: { 
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ name: document.getElementById("name-edit").value })
        }
        const response = await fetch('http://127.0.0.1:8000/product-categories/' + id, requestOptions);
        
        if(response.status === 200) {
            window.location.href = "http://127.0.0.1:8000/product-categories"
        }
    }

</script>
@endsection

@endsection