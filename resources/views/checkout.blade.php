@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chackout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<h1 class="text-center">Chackout</h1>
<a href="/cart"><h3 class="text-center">BACK</h3></a>



<div class="container"> 
<div class="row">

        <div class="col-md-6">
        <form action="order"enctype="multipart/form-data" method="post">
                @csrf
                
                <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" style="width: 250px; " name="u_name" required>
                </div>

                <div class="form-group">
                <label for="Email">Email:</label>
                <input type="email" class="form-control" style="width: 250px;" value="{{auth()->user()->email}}" name="email" required>
                </div>

                <div class="form-group">
                <label for="phone">Phone #:</label>
                <input type="text" class="form-control" style="width: 250px;"name="phone" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                </div>

                <div class="form-group">
                <label for="email">Address :</label>
                <input type="text" class="form-control" style="width: 250px;" name="address" required>
                </div>

                <div class="form-group">
                <input type="submit" value="Submit">
                </div>
                </form>
        </div>
       
       
        <div class="col-md-6" style="background:lightgray;">
            <h2 class="text-center" style="padding-top:150px;">Grand Total:{{$grandtotal}} </h2>
        </div>

    </div>
    </div>


</body>     
</html>

@endsection