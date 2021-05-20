@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List </title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('js/custum.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<div class="container">
@if(Session::has('massage'))
    <div class="alert alert-success text-center"> {{ Session::get('massage') }}</div>
    

  @endif

<h1 class="text-center"> Product List</h1>
<div class="container">
<div class="row">
<div class="col-md-4">
<a class="text-center" href="/add-product"><h3>Add Product</h3></a>

</div>
<div class="col-md-4">
<a class="text-center" href="cart"><h3>View Cart</h3></a>

</div>
<div class="col-md-4">
<a class="text-center" href="order-list"><h3>View Orders</h3></a>

</div>
</div>
</div>
<br>
<br>
<br>
<table class="table" id="cart-section">
<tr>

<td>Name</td>
<td>Price</td>
<td>Image</td>
<td>Edit</td>
<td>Delete</td>
<td>Add To Cart</td>
</tr>
@foreach($products as $pro)
<tr>
<td>{{$pro->name}}</td>
<td>{{$pro->price}}</td>
<td><img src="{{ asset('/images/'.$pro->image) }}" alt="" title="" width="50px" height="50px"></td>
<td><a href="{{ route('edit-product',$pro->id) }}">Edit</a></td>
<td><a href="#"  onclick="deleteProduct('{{$pro->id}}','{{route('delete-pro',$pro->id)}}')">Delete</a></td>
<td><a href="#"  onclick="AddToCart('{{$pro->id}}','{{route('add-to-cart',$pro->id)}}')">Add To Cart</a></td>
</tr>
@endforeach

</table>
</div>
</body>
</html>



@endsection