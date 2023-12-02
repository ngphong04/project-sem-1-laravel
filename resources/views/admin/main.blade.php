<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('assets-server')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets-server')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets-server')}}/css/AdminLTE.css">
    <link rel="stylesheet" href="{{asset('assets-server')}}/css/_all-skins.min.css">
    <link rel="stylesheet" href="{{asset('assets-server')}}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('assets-server')}}/css/style.css" />
    @yield('css')
    <script src="{{asset('assets-server')}}/js/angular.min.js"></script>
    <script src="{{asset('assets-server')}}/js/app.js"></script>
</head>

<body class="hold-transition skin-black-light sidebar-mini">
    <div class="wrapper ">

        @include('admin.layouts.header')
        @include('admin.layouts.menu')
        <div class="content-wrapper">
            @yield('main-content')
        </div>
        @include('admin.layouts.footer')


    </div>
    
    <script src="{{asset('assets-server')}}/js/jquery.min.js"></script>
    <script src="{{asset('assets-server')}}/js/jquery-ui.js"></script>
    <script src="{{asset('assets-server')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('assets-server')}}/js/adminlte.min.js"></script>
    <script src="{{asset('assets-server')}}/js/dashboard.js"></script>
    <script src="{{asset('assets-server')}}/tinymce/tinymce.min.js"></script>
    <script src="{{asset('assets-server')}}/tinymce/config.js"></script>
    <script src="{{asset('assets-server')}}/js/function.js"></script>
    @yield('custom_script')
</body>

</html>
