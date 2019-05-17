<header class="nav-top">
    <div class="container">
        <ul class="top-flex">
            <li class="top-item">
                <a href="{{ route('home.index.index') }}">首页</a>
            </li>
            @foreach($categories as $category)
                <li class="top-item">
                    <a href="{{ route('home.category.index',$category->id) }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</header>