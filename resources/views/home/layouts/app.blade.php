<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Fireworks Blog')</title>
    <!-- 样式 -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
{{--<div class="loader">--}}
    {{--<img src="{{ asset('images/loading.gif') }}" alt="">--}}
{{--</div>--}}
<div id="app">
    @yield('header')
    @yield('content')
    @include('home.layouts._footer')
</div>

<!-- JS 脚本 -->
<script src="{{ mix('js/app.js') }}"></script>
@yield('scriptAfterJs')
</body>
</html>