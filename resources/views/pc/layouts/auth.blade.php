<!DOCTYPE html>
<html lang="jp">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="{!! asset('/ui/vendors/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('/ui/vendors/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('/ui/vendors/nprogress/nprogress.css') !!}" rel="stylesheet">
        <link href="{!! asset('/ui/vendors/animate.css/animate.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('/ui/build/css/custom.min.css') !!}" rel="stylesheet">
    </head>
    <body class="login">
        @yield('content')
    </body>
</html>