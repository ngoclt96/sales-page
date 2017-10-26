<!DOCTYPE html>
<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}">
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link href="/ui/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/ui/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/ui/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/ui/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/ui/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/ui/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/ui/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="/ui/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/ui/vendors/select2/dist/css/select2.min.css">
    <!-- Custom Theme Style -->
    <link href="/ui/build/css/custom.min.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
</head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    @include('pc.elements.left_nav')
                </div>
                <!-- top navigation -->
                <div class="top_nav">
                    @include('pc.elements.top_nav')
                </div>
                <!-- /top navigation -->
                <!-- page content -->
                <div class="right_col" role="main">
                    @yield('content')
                </div>
                <!-- /page content -->
                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                      APP NAME
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
        <!-- jQuery -->
        <script src="/ui/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="/ui/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="/ui/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="/ui/vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="/ui/vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="/ui/vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="/ui/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="/ui/vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="/ui/vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="/ui/vendors/Flot/jquery.flot.js"></script>
        <script src="/ui/vendors/Flot/jquery.flot.pie.js"></script>
        <script src="/ui/vendors/Flot/jquery.flot.time.js"></script>
        <script src="/ui/vendors/Flot/jquery.flot.stack.js"></script>
        <script src="/ui/vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="/ui/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="/ui/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="/ui/vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="/ui/vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="/ui/vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="/ui/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="/ui/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="/ui/vendors/moment/min/moment.min.js"></script>
        <script src="/ui/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="/ui/build/js/custom.min.js"></script>
        <!-- Custom js -->
        <script src="/js/plugin/ckeditor/ckeditor.js"></script>
        <script src="/js/plugin/ckfinder/ckfinder.js"></script>
        <script src="/js/custom.js"></script>
        <script src="/js/zipbar.js"></script>
        @yield('script')
        <!-- jQuery -->

    </body>
</html>