<!DOCTYPE html>
<html>
<head>
	<title>Activation Email </title>
</head>
<body>
	<p>
		Wellcome, {{ $name }}
		Please active your account : {{ url('user/activation', $link)}}
	</p>
</body>
</html>