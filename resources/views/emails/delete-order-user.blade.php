<!DOCTYPE html>
<html>
<body>
	<p>

		The user with name: {{$name}} has email: {{$email}} <br>
		His order:	<br>	
		 - Product Name: {{$productName}} <br>
		 - Price: {!!number_format($price,0,",",".") . ' đ'!!} <br>
		 - Quantity: {{$quantity}} <br>
		 - Total: {!!number_format($price*$quantity,0,",",".") . ' đ'!!} <br>

		This order was deleted. <br>

        Thanks,
	</p>
</body>
</html>