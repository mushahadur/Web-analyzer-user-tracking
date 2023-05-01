<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title')</title>

    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('front')}}/js-vector-map/vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />
{{--    <link href="{{asset('front/assets/css/bootstrap.min.css')}}" rel="stylesheet" />--}}

{{--    <link href="{{asset('front')}}/js-vector-map/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />--}}
{{--    <link href="{{asset('front')}}/js-vector-map/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />--}}



    <link href="{{asset('front/system')}}/assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="{{asset('front/system')}}/assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="{{asset('front/system')}}/assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">

    <link href="{{asset('front/system')}}/assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
    <link href="{{asset('front/system')}}/assets/css/datatables.min.css" rel="stylesheet">
    <link href="{{asset('front/system')}}/assets/css/datatables-select.min.css" rel="stylesheet">

    <!-- PLUGINS STYLES-->
    <link href="{{asset('front')}}/js-vector-map/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{asset('front')}}js-vector-map/vendors/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->

    <link href="{{asset('front')}}/assets/css/progressBar.css" rel="stylesheet">
    <script src="{{asset('front')}}/js-vector-map/vendors/my-chart-data-day.js"></script>
    <link href="{{asset('front/system')}}/assets/css/master.css" rel="stylesheet">

</head>

<body>
<div class="wrapper">

    @include('Layout.sitebar')

    <div id="body" class="active">
        <!-- navbar navigation component -->
        @include('Layout.headerMenu')

        <!-- end of navbar navigation -->
        <div class="content">

            @yield('content')

        </div>
    </div>
</div>


<!-- CORE PLUGINS-->
<script src="{{asset('front')}}/js-vector-map/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('front')}}/js-vector-map/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="{{asset('front')}}/js-vector-map/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
<script src="{{asset('front')}}/js-vector-map/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="{{asset('front')}}/js-vector-map/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<!-- PAGE LEVEL SCRIPTS-->


{{--<script type="text/javascript" src="{{asset('front/assets/js/Chart.js')}}" ></script>--}}
<script type="text/javascript" src="{{asset('front')}}/js-vector-map/vendors/chart.js/chart.min.js" ></script>
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/maps.js"></script>
<script src="https://cdn.amcharts.com/lib/4/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<script src="{{asset('front/system')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
{{--<script src="{{asset('front/system')}}/assets/vendor/chartsjs/Chart.min.js"></script>--}}
<script src="{{asset('front/system')}}/assets/js/dashboard-charts.js"></script>
<script src="{{asset('front/system')}}/assets/js/script.js"></script>
<script src="{{asset('front/system')}}/assets/js/datatables.min.js"></script>
<script src="{{asset('front/system')}}/assets/js/datatables-select.min.js"></script>


<script type="text/javascript" src="{{asset('front/assets/canvasjs/canvasjs.stock.min.js')}}" ></script>
<script type="text/javascript" src="{{asset('front/assets/js/progress-bar.js')}}" ></script>

{{--<rect width="66" height="21"></rect>--}}
<!-- Resources -->


<script type="text/javascript" src="{{asset('front/assets/js/axios.min.js')}}" ></script>

<script src="{{asset('front')}}/js-vector-map/vendors/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>

<script src="{{asset('front/system')}}/assets/js/custom.js"></script>

@yield('script')
</body>

</html>
