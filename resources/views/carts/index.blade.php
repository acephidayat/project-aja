@extends('layouts.app')

@section('content')
<div class= "container mt-4">
    <h1>Cart Product</h1>
    {{-- <a href="/" class="btn btn-primary mb-4">Add Product</a> --}}
    <table class="table table-bordered table-striped tabel-hover">
        <tr>
            <th>#</th>
            <th>Code</th>
            <th>Product Name</th>
            <th>Paid</th>
            <th>Catagory</th>
            <th colspan="2">Action</th>
        </tr>
        @foreach ($Carts as $Cart )
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$Cart->code}}</td>
            <td>{{$Cart->product_id}}</td>
            <td>{{$Cart->paid}}</td>
          
            <td>
                <a href="/admin/product/{{$product->id}}/edit" class="btn btn-info">Edit</a>
            </td>
            <td>
                <form action="/admin/product/{{$product->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>    
        @endforeach
        
    </table>
</div>
@endsection