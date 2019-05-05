@if ($paginator->hasPages())
    <div class="box-footer" >
        <div class="page-info pagination" style="float: left;height: 34px;line-height: 34px;padding-left: 8px;">从 <span> 1页</span> 到 <span>{{ $paginator->lastPage() }}页</span> ，总共 <span>{{ $paginator->total() }}</span> 条</div>
        <ul class="pagination" style="float: right">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"><span>上一页</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">上一页</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">下一页</a></li>
            @else
                <li class="disabled"><span>下一页</span></li>
            @endif
        </ul>
    </div>
@endif