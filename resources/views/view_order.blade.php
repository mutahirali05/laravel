@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>
<body>
    <h1 class="text-center">Order # {{$view_cart[0]->o_id}}</h1>
<a href="/"><h3 class="text-center">BACK Home</h3></a>

<div class="container">
<table class="table">

<tr>

<td>Name</td>
<td>Price</td>
<td>Quantity</td>
<td>Image</td>
<td>Total</td>


</tr>

    @foreach($view_cart as $cart)

<tr>


<td>{{$cart->name}}</td>
<td>{{$cart->price}}</td>
<td>{{$cart->quantity}}</td>
<td><img src="{{ asset('/images/'.$cart->image) }}" alt="" title="" width="50px" height="50px"></td>
<td>{{$cart->total}}</td>
<td></td>


</tr>
@endforeach


</table>
<h3 class="text-right">Grand Total {{$sum}}</h3>
</div>
</body>
</html>

@endsection