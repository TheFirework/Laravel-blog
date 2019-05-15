@if(!empty($articles))
    @foreach($articles as $article)
        <article class="article-item">
            <div class="article-item-content">
                <a href="#">
                    <header class="article-item-header">
                        <span class="article-item-category">{{ $article->category->name }}</span>
                        <h2 class="article-item-title">{{ $article->title }}</h2>
                    </header>
                    <section class="article-item-description">
                        <p>{{ $article->description }}</p>
                    </section>
                </a>
                <footer class="article-item-footer">
                    <div class="publication-date">
                        {{ $article->updated_at }}
                    </div>
                </footer>
            </div>
        </article>
    @endforeach
@endif