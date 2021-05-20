
@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('js/custum.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<h1 class="text-center"> Order List</h1>
<a href="/"><h3 class="text-center">BACK Home</h3></a>

<div class="container">
<table class="table" id="order-section">
<tr>
<td>User Name</td>
<td>Email</td>
<td>Phone#</td>
<td>Address</td>

<td>Action</td>
</tr>
@foreach($orders as $order)
<tr>
<td>{{$order->u_name}}</td>
<td>{{$order->email}}</td>
<td>{{$order->phone}}</td>
<td>{{$order->address}}</td>
<td><a href="{{ route('view-order',$order->o_id) }}">View</a> / <a href="#"  onclick="deleteOrder('{{$order->o_id}}','{{route('delete-order',$order->o_id)}}')" >Delete </a></td>
</tr>
@endforeach
</table>
</div>
</body>
</html>
@endsection