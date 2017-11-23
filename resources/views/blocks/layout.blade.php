<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Accounting system</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Fuel Serve Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	SmartPhone Compatible web template, free web designs  for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('assets/css/style.css') }}" rel='stylesheet' type='text/css' />
    {{--<link href="{{ asset('assets/sass/app.css') }}" rel='stylesheet' type='text/css' />--}}
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet"> 			<!-- font-awesome icons -->
    <!-- //Custom Theme files -->
    <!-- fonts -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
    <!-- //fonts -->
    <!-- js -->
    <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"> </script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <script src="{{ asset('assets/js/menu_jquery.js') }}"></script> <!-- pop-up -->
    <style>
        @yield('css')

        body{
            font-family: 'PT Sans', Helvetica, Arial, sans-serif;
        }

    </style>
    <!-- //js -->
</head>
<body>

@include('blocks.header')
<!-- banner -->
@yield('content')
<!-- //news-bottom -->
<!-- footer -->
@include('blocks.footer')
<!-- //footer -->
<!-- smooth-scrolling-of-move-up -->
<script type="text/javascript" src="{{asset('assets/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/easing.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/my_scripts.js')}}"></script>
{{--<script type="text/javascript" src="{{asset('assets/js/easing.js')}}"></script>--}}
<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //smooth-scrolling-of-move-up -->
</body>
</html>