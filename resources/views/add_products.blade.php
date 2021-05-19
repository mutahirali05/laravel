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

</head>
<body>
    <h1 class="text-center">Add products</h1>
    <a href="/"><h3 class="text-center">BACK</h3></a>

   


    
    <div class="container">
        <form action="/store-product"enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name"  style="width: 250px;" required >
        </div>

        <div class="form-group">
        <label for="price">Price:</label>
        <input type="text" name="price"   class="form-control" style="width: 250px;" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
        </div>

        <div class="form-group">
        <label for="email">Image:</label>
        <input input type="file" name="image"   class="form-control" style="width: 250px;" required>
        </div>

        <div class="form-group">
        <input type="submit" value="Submit">
        </div>
        </form>
    </div>
</body>
</html>

@endsection