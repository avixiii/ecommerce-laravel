@if ($paginator->hasPages())
    <div class="paging" style="margin-top: 100px">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span style="font-size: 26px;transform: translateY(-14px);display: block;" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a style="font-size: 26px;transform: translateY(-14px);display: block;" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a href="" class="paging__line active"></a>
                        @else
                            <a href="{{ $url }}" class="paging__line"></a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a style="font-size: 26px;transform: translateY(-14px);display: block;" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li  class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span style="font-size: 26px;transform: translateY(-14px);display: block;" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
    </div>
@endif
