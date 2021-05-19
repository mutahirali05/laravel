@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>CART</title>
</head>
<body>
    <h1 class="text-center">CART</h1>
    <a href="/"><h3 class="text-center">BACK</h3></a>

<div class="container">
<table class="table">

<tr>
<td>Name</td>
<td>Price</td>
<td>Quantity</td>
<td>Image</td>
<td>Total</td>
<td>Delete</td>

</tr>
@if(session()->has('cart'))
@php
    $i  = 0;
   @endphp
<form action="/update-quantity"enctype="multipart/form-data" method="POST">
        @csrf
    @foreach(session('cart') as $id => $details)
<input type="hidden" name="p_id[{{$i}}]" value="{{$details['id']}}">
<input type="hidden" name="name[{{$i}}]" value="{{$details['name']}}">
<input type="hidden" name="price[{{$i}}]" value="{{$details['price']}}">
<tr>
<td>{{$details['name']}}</td>
<td>{{$details['price']}}</td>
<td><input type="text" value="{{$details['quantity']}}" name="quantity[{{$i}}]" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" /></td>
<td><img src="{{ asset('/images/'.$details['image']) }}" alt="" title="" width="50px" height="50px"></td>
<td>{{ $details['quantity'] * $details['price']}}</td>

<td><a href="{{ route('delete-cart',$details['id']) }}" onclick="return confirm('Are you sure you want to delete this item')">Delete</a></td>

</tr>`
@php
    $i ++;
    @endphp
@endforeach
@endif
<tr>
@if(session()->get('cart'))
<td ><input type="submit" value="Update Cart"></td>
<td ><a href="/checkout" class="btn btn-success">Chackout</a></td>
@endif
</tr>
</form>     
</table>
</div>
</body>
</html>

@endsection