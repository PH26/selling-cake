<!DOCTYPE html>
<html>
<body>
	<p>
		Hello, {{$name}} <br>
		Here is detail about order you done at Vanila Bakery <br>
			
		<table class="table">
			<thead>
				<tr>
					<th scope="col">Product Name</th>
					<th scope="col">Quantity</th>
					<th scope="col">Total</th>
				</tr>
			</thead>
			<tbody >
				<tr>
					<td scope="row" >{{$productName}}</td>
					<td >{{$quantity}}</td>
					<td >{!!number_format($price*$quantity,0,",",".") . ' đ'!!}</td>
				</tr>
			</tbody>
		</table> <br>
					
		Thanks because of you order cake at vanila Bakery
	</p>
</body>
</html>