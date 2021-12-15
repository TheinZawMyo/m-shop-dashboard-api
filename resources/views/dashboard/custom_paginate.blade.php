@if ($paginator->hasPages())
    <div class="custom_pager">
        <ul class="pager">

            @if ($paginator->onFirstPage())
                <li class="disabled"><span>← Previous</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
            @endif



            @foreach ($elements as $element)

                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif



                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active my-active"><span class="page_no">{{ $page }}</span></li>
                        @else
                            <li class="page_no"><a href="{{ $url }}" >{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach



            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
            @else
                <li class="disabled"><span>Next →</span></li>
            @endif
        </ul>
    </div>
@endif
