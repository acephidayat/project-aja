@extends('layouts.app')

@section('content')
<div class="container mt-4">
    @foreach ($errors->all() as $error )
        <div class ="alert alert-alt alert-danger alert-dismissible" role="alert">
            <p class="alert-link">{{ $error }}</p>
        </div>
    @endforeach
    <h1 class="mb-4">Add Product</h1>
    <form action="/admin/product" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Code</label>
        <input type="text" name="code" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Category</label>
        <input type="text" name="kategori" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Photo</label>
        <input type="file" name="photo" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection