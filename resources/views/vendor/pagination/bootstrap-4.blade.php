@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            
        @else
            <li class="page-item prev">
                <a class="page-link brd-rd2" href="{{ $paginator->previousPageUrl() }}" itemprop="url">PREVIOUS</a>
            </li>
        @endif

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="true"><span class="page-link brd-rd2">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link brd-rd2" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        
        @if ($paginator->hasMorePages())
            <li class="page-item next"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" itemprop="url">NEXT</a></li>
        @else

        @endif
    </ul>
@endif
