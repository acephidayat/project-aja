@extends('layouts.app')

@section('content')
<div class= "container mt-4">
    <h1>Admin Product</h1>
    <a href="" class="btn btn-primary mb-4">Add Product</a>
    <table class="table table-bordered table-striped tabel-hover">
        <tr>
            <th>#</th>
            <th>Code</th>
            <th>Product Name</th>
            <th>Catagory</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>1</td>
            <td>121314</td>
            <td>Kibif Sosis</td>
            <td>Sosis</td>
            <td></td>
            <td>
                <a href="" class="btn btn-info">Edit</a>
                <a href="" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    </table>
</div>
@endsection