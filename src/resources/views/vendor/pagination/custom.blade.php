@if ($paginator->hasPages())
<div class="pagination">
    <div class="paginate-number">
        <p class="paginate-text-all">
            全<span>{{ $paginator->total() }}</span>件中
        </p>
        <p class="paginate-text-current">
            <span>{{ $paginator->firstItem() }}</span>~<span>{{ $paginator->lastItem() }}</span>件
        </p>
    </div>
    <div class="paginate-page">
        @if ($paginator->onFirstPage())
            <span class="current-paginate"><</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="another-paginate"><</a>
        @endif

        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="current-paginate-page">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="another-paginate-page">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="another-paginate">></a>
        @else
            <span class="current-paginate">></span>
        @endif
    </div>
</div>
@endif