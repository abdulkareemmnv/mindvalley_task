@if ($paginator->hasPages())
    <ul class="pagination flex list-reset border border-grey-light rounded w-auto font-sans bg-white" role="navigation" style="margin: 0 auto;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true" class="block hover:text-white hover:bg-blue text-blue border-r border-grey-light px-3 py-2">&lsaquo;</span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="block hover:text-white hover:bg-blue text-blue border-r border-grey-light px-3 py-2" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span class="block hover:text-white hover:bg-blue text-blue border-r border-grey-light px-3 py-2">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><span class="block text-white bg-blue border-r border-blue px-3 py-2">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="block hover:text-white hover:bg-blue text-blue border-r border-grey-light px-3 py-2">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="block hover:text-white hover:bg-blue text-blue px-3 py-2" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true" class="block hover:text-white hover:bg-blue text-blue px-3 py-2">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif
