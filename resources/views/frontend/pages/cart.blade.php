<!DOCTYPE html>
<html lang="en">
<head>
  <title>VIEW CART</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Order</h2>             
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Image</th>
        
      </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
      <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->qty}}</td>
        <td>{{$item->price}}</td>
        <td>{{$item->image}}</td>        
        <td><a href="{{route('deletecart', $item->rowId)}}"><button type="button" class="btn btn-primary">Delete</button></a></td>        
      </tr>
     @endforeach
     <td>Total: {{$total}}</td>  
     
    </tbody>
  </table>
  <a href="{{asset('cart/delete/all')}}"><button type="button" class="btn btn-danger pull-right">Delete all</button></a> 
  <a href="/category"><button type="button" class="btn btn-info ">Buy more</button></a>
</div>
</body>
</html>