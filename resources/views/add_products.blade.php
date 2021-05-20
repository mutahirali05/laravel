@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('js/custum.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Add products</h1>
    <a href="/"><h3 class="text-center">BACK</h3></a>
   
    <div class="container">
        <!-- <form action="/store-product"enctype="multipart/form-data" method="POST">
        @csrf -->
        <form id="contactForm">
        @csrf
        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
        <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name" id="name" style="width: 250px;" required >
        </div>

        <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" name="price"  id="price"  class="form-control" style="width: 250px;" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
        </div>

        <div class="form-group">
        <label for="email">Image:</label>
        <input input type="file" name="image" id="image"  class="form-control" style="width: 250px;" required>
        </div>

        <div class="form-group">
        <!-- <input type="submit" value="Submit" id="addproduct"> -->
        <!-- <button type="submit" class="btn btn-primary" onclick="addProduct()">Submit</button> -->
        <button class="btn btn-success" onclick="pro()">Submit</button>

        </div>
        </form>
       

    </div>
    
</body>
</html>

@endsection