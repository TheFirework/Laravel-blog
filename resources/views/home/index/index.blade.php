@extends('home.layouts.app')
@section('title', 'Fireworks Blog')

@section('header')
    @include('home.layouts._header')
@stop

@section('content')
    <div class="main">
        <div class="container">
            <div class="article-list infinite-scroll">
                {{--@if(!empty($articles))--}}
                    {{--@foreach($articles as $article)--}}
                        {{--<article class="article-item">--}}
                            {{--<div class="article-item-content">--}}
                                {{--<a href="#">--}}
                                    {{--<header class="article-item-header">--}}
                                        {{--<span class="article-item-category">{{ $article->category->name }}</span>--}}
                                        {{--<h2 class="article-item-title">{{ $article->title }}</h2>--}}
                                    {{--</header>--}}
                                    {{--<section class="article-item-description">--}}
                                        {{--<p>{{ $article->description }}</p>--}}
                                    {{--</section>--}}
                                {{--</a>--}}
                                {{--<footer class="article-item-footer">--}}
                                    {{--<div class="publication-date">--}}
                                        {{--{{ $article->updated_at }}--}}
                                    {{--</div>--}}
                                {{--</footer>--}}
                            {{--</div>--}}
                        {{--</article>--}}
                    {{--@endforeach--}}
                {{--@endif--}}
            </div>
        </div>
    </div>
@stop

@section('scriptAfterJs')
    <script>
        var maxPages = parseInt("{{ $articles->lastPage() }}");
    </script>
    {{--<script>--}}
        {{--var page = 1;--}}
        {{--$(window).scroll(function () {--}}
            {{--if ($(window).scrollTop() + $(window).height() + 1 >= $(document).height()) {--}}
                {{--page++;--}}
                {{--loadMoreData(page);--}}
            {{--}--}}
        {{--});--}}

        {{--function loadMoreData(page) {--}}
            {{--$.ajax(--}}
                {{--{--}}
                    {{--url: '?page=' + page,--}}
                    {{--type: "get",--}}
                    {{--beforeSend: function () {--}}
                        {{--$('.ajax-load').show();--}}
                    {{--}--}}
                {{--})--}}
                {{--.done(function (data) {--}}
                    {{--if (data.html == " ") {--}}
                        {{--$('.ajax-load').html("没有数据了……");--}}
                        {{--return;--}}
                    {{--}--}}
                    {{--// $('.ajax-load').hide();--}}
                    {{--$(".infinite-scroll").append(data.html);--}}
                {{--})--}}
                {{--.fail(function (jqXHR, ajaxOptions, thrownError) {--}}
                    {{--alert('服务未响应……');--}}
                {{--});--}}
        {{--}--}}
    {{--</script>--}}
@endsection