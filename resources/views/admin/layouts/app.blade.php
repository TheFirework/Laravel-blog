<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel Blog') - 后台管理</title>

    <link rel="stylesheet" href="{{ asset("laravel-admin/font-awesome/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ asset("laravel-admin/AdminLTE/dist/css/skins/skin-blue-light.css") }}">
    <link rel="stylesheet" href="{{ asset("laravel-admin/AdminLTE/plugins/iCheck/square/blue.css") }}">
    <link rel="stylesheet" href="{{ asset('laravel-admin/nprogress/nprogress.css') }}">
    <link rel="stylesheet" href="{{ asset('laravel-admin/nestable/nestable.css') }}">
    <link rel="stylesheet" href="{{ asset('laravel-admin/editormd/css/editormd.min.css') }}" />
    <link rel="stylesheet" href="{{ asset("laravel-admin/bootstrap-fileinput/css/fileinput.min.css") }}">
    <link rel="stylesheet" href="{{ asset('laravel-admin/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('laravel-admin/nestable/nestable.css') }}">
    <link rel="stylesheet" href="{{ asset("laravel-admin/AdminLTE/dist/css/AdminLTE.min.css") }}">
    <link href="{{ mix('css/laravel-admin.css') }}" rel="stylesheet">
    <script src="{{ mix("js/laravel-admin.js")}}"></script>
    <script src="{{ asset('laravel-admin/AdminLTE/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('laravel-admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

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
    <div class="content-wrapper" id="pjax-container" style="min-height: 1000px;">
        @yield('content')
    </div>
    {{--@include('admin.layouts._footer')--}}
</div>
<!-- JS 脚本 -->
<script>
    function LA() {}
    LA.token = "{{ csrf_token() }}";
</script>

<script src="{{ asset('laravel-admin/jquery-pjax/jquery.pjax.js') }}"></script>
<script src="{{ asset('laravel-admin/nprogress/nprogress.js') }}"></script>
<script src="{{ asset("laravel-admin/AdminLTE/plugins/iCheck/icheck.min.js")}}"></script>
<script src="{{ asset('laravel-admin/nestable/jquery.nestable.js') }}"></script>
{{--<script src="{{ asset("laravel-admin/admin-base.js")}}"></script>--}}
<script src="{{ asset('laravel-admin/editormd/editormd.min.js') }}"></script>
<script src="{{ asset('laravel-admin/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
<script src="{{ asset('laravel-admin/select2/js/select2.js') }}"></script>
<script src="{{ asset('laravel-admin/nestable/jquery.nestable.js') }}"></script>

@include('myflash::notification')
<script>
    $(document).ready(function()
    {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            // radioClass: 'iradio_minimal-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
@yield('scriptAfterJs')
</body>
</html>