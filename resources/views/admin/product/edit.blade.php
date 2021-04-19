@extends('layouts.app')

@section('content')
<div class="container mt-4">
   
    <h1 class="mb-4">Edit Product</h1>
    <form action="/admin/product" method="POST">
  
    <div class="mb-3">
        <label for="form-label">Code</label>
        <input type="text" name="code" class="form-control">
    </div>
    <div class="mb-3">
        <label for="form-label">Product Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="mb-3">
        <label for="form-label">Category</label>
        <input type="text" name="categori" class="form-control">
    </div>
    <div class="mb-3">
        <label for="form-label">Photo</label>
        <input type="text" name="code" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection