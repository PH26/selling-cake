<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="frontend/images/favicon.png" rel="icon">
    <title>Vanila Bakery</title>

    <base href="{{asset('')}}">
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700%7CPacifico%7CVarela+Round%7CPoppins" rel="stylesheet">
    <link rel="stylesheet" href="frontend/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="frontend/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="frontend/plugins/ps-icon/ps-icon.css">
    <!-- CSS Library-->
    <link rel="stylesheet" href="frontend/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="frontend/plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="frontend/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="frontend/plugins/Magnific-Popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="frontend/plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="frontend/plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="frontend/plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="frontend/plugins/revolution/css/settings.css">
    <link rel="stylesheet" href="frontend/plugins/revolution/css/layers.css">
    <link rel="stylesheet" href="frontend/plugins/revolution/css/navigation.css">
    <!-- Custom-->
    <link rel="stylesheet" href="frontend/css/style.css">
</head>

<body class="page-init">

    @include('frontend.layout.header')
    @yield('content')
    @include('frontend.layout.footer')

    <!-- JS Library-->
    <script type="text/javascript" src="frontend/plugins/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/owl-carousel/owl.carousel.min.js"></script> 
    <script type="text/javascript" src="frontend/plugins/overflow-text.js"></script>
    <script type="text/javascript" src="frontend/plugins/masonry.pkgd.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/imagesloaded.pkgd.js"></script>
    <script type="text/javascript" src="frontend/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/moment.js"></script>
    <script type="text/javascript" src="frontend/plugins/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/slick/slick/slick.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/skrollr.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/gmap3.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script>
    <!-- Revolution - slider-->
    <script type="text/javascript" src="frontend/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="frontend/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <!-- Custom scripts-->
    <script type="text/javascript" src="frontend/js/main.js"></script>
    <script type="text/javascript" src="frontend/js/myjavascript.js"></script>
    <script type="text/javascript" src="frontend/js/search.js"></script>
    <script type="text/javascript" src="frontend/js/selected_category.js"></script>
</body>
</body>

</html>