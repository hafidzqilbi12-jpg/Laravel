@if ($paginator->hasPages())
    <div class="pagination">

        @if ($paginator->onFirstPage())
            <span>« Sebelumnya</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}">
                « Sebelumnya
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">
                Berikutnya »
            </a>
        @else
            <span>Berikutnya »</span>
        @endif

    </div>
@endif