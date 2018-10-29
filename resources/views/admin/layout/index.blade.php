<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<link href="frontend/images/favicon.png" rel="icon">

		<title>Vanila Bakery Admin</title>

        <base href="{{asset('')}}">
		<meta name="description" content="Common form elements and layouts" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="admin_asset/css/bootstrap.min.css" />
		<link rel="stylesheet" href="admin_asset/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">


		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="admin_asset/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="admin_asset/css/chosen.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="admin_asset/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="admin_asset/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="admin_asset/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="admin_asset/css/ace-skins.min.css" />
		<link rel="stylesheet" href="admin_asset/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="admin_asset/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="admin_asset/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="admin_asset/js/html5shiv.min.js"></script>
		<script src="admin_asset/js/respond.min.js"></script>
		<![endif]-->
	</head>

<body class="no-skin">


       @include('admin.layout.header')
       @include('admin.layout.menu')
       @yield('content')

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="admin_asset/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="admin_asset/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='admin_asset/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="admin_asset/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="admin_asset/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="admin_asset/js/jquery-ui.custom.min.js"></script>
		<script src="admin_asset/js/autosize.min.js"></script>
		<script src="admin_asset/js/jquery.maskedinput.min.js"></script>

		<!-- ace scripts -->
		<script src="admin_asset/js/ace-elements.min.js"></script>
		<script src="admin_asset/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script src="admin_asset/ckeditor/ckeditor.js"></script>

		@yield('script')
        </body>
		@include('admin.layout.footer')

</html>
