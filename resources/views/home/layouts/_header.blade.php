<header class="site-header" style="background-image: url('{{ asset('images/fireworks.png') }}')">
{{--<header class="site-header" style="background-image: url('https://casper.ghost.org/v1.0.0/images/blog-cover.jpg')">--}}
    <div class="site-header-inner container">
        <div class="site-header-content">
            <h1 class="site-title">
                <img class="logo-img" src="https://casper.ghost.org/v1.0.0/images/ghost-logo.svg" alt="">
            </h1>
            <h2 class="site-description">
                人生苦短，亦如烟火易逝
            </h2>
        </div>
        <nav class="site-nav">
            <div class="site-left-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{ route('home.index.index') }}">首页</a>
                    </li>
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a href="#">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="site-right-nav">

            </div>
        </nav>
    </div>
</header>