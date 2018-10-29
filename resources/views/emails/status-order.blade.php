<!DOCTYPE html>
<html>
<body>
	<p>
		Hello {{$name}}, <br>

		Your order:	<br>	
		 - Product Name: {{$productName}} <br>
		 - Price: {!!number_format($price,0,",",".") . ' đ'!!} <br>
		 - Quantity: {{$quantity}} <br>
		 - Total: {!!number_format($price*$quantity,0,",",".") . ' đ'!!} <br>

		This staus order changed to {{$status}} <br>
		We will process this order for you as soon as we can. <br>

        Thanks,
	</p>
</body>
</html>