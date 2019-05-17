<div class="article-left">
    <section class="article-left-box search-box">
        <form action="#" method="post">
            <input type="text" id="search" class="search-input">
            <input type="submit" class="search-btn" value="Search">
        </form>
    </section>
    <section class="article-left-box tag-box">
        <ol class="tags">
            @foreach($tags as $tag)
                <li class="tags-item">
                    <a href="{{ route('home.tag.index',$tag->id) }}">{{ $tag->name }}</a>
                </li>
            @endforeach
        </ol>
    </section>
</div>