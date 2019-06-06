<div class='column is-3'>
        @if ($paginator->hasPages())
            {{-- <ul class="pagination"> --}}
            <ul><nav class="pagination is-rounded" role="navigation" aria-label="pagination" style="margin-bottom:1.5em">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    {{-- <li class="disabled"><span>&laquo;</span></li> --}}
                    <li><a class="pagination-previous disabled" disabled><span>&laquo;</span></a></li>
                @else
                    {{-- <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li> --}}
                    <li><a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous" rel="prev"><span>&laquo;</span></a></li>
                @endif
        
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        {{-- <li class="disabled"><span>{{ $element }}</span></li> --}}
                        <li><span class="pagination-ellipsis">{{ $element }}</span></li>
                        
                    @endif
        
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                {{-- <li class="active"><span>{{ $page }}</span></li> --}}
                                <li><a class="pagination-link is-current active" aria-label="Page {{ $page }}" aria-current="page">{{ $page }}</a></li>
                            @else
                                {{-- <li><a href="{{ $url }}">{{ $page }}</a></li> --}}
                                <li><a href="{{ $url }}" class="pagination-link" aria-label="Goto page {{ $page }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
        
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    {{-- <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li> --}}
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-next"><span>&raquo;</span></a>
                @else
                    {{-- <li class="disabled"><span>&raquo;</span></li> --}}
                    <a class="pagination-next disabled" disabled><span>&raquo;</span></a>
                @endif
            </ul>
        @endif
        
        </div>
        
        
        
        