<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel Blog') - 后台管理</title>

    <link href="{{ mix('css/laravel-admin.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("laravel-admin/font-awesome/css/font-awesome.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("laravel-admin/AdminLTE/dist/css/AdminLTE.min.css") }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset("laravel-admin/AdminLTE/dist/css/skins/_all-skins.min.css") }}">

    <link rel="stylesheet" href="{{ asset("laravel-admin/AdminLTE/plugins/iCheck/square/blue.css") }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('css')
</head>
<body class="skin-blue-light sidebar-mini">
<div class="wrapper" id="app" >
    @include('admin.layouts._header')
    @include('admin.layouts._slidebar')
    <div class="content-wrapper">
        @yield('content')
    </div>
    @include('admin.layouts._footer')
</div>
<!-- JS 脚本 -->
<script>
    function LA() {}
    LA.token = "{{ csrf_token() }}";
</script>
<script src="{{ mix("js/laravel-admin.js")}}"></script>
<script src="{{ asset('laravel-admin/AdminLTE/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset("laravel-admin/AdminLTE/plugins/iCheck/icheck.min.js")}}"></script>

@include('myflash::notification')
<script>
    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('scriptAfterJs')
</body>
</html>