@if ($paginator->hasPages())

<nav class="flex justify-center mt-10">
    <ul class="flex flex-wrap items-center gap-1 text-sm">

        <!-- -- Previous Page Link -- -->
        @if ($paginator->onFirstPage())
        <li>
            <span class="px-3 py-1 text-gray-100 cursor-not-allowed">&larr; Prev</span>
        </li>
        @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 text-blue-600 hover:underline">&larr; Prev</a>
        </li>
        @endif

        <!-- -- Page Number Links -- -->
        @foreach ($elements as $element)
            @if (is_string($element))
            <li>
                <span class="px-2 py-1 text-gray-500">{{ $element }}</span>
            </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li>
                        <span class="px-3 py-1 font-semibold text-white bg-blue-600 rounded">{{ $page }}</span>
                    </li>
                    @else
                    <li>
                        <a href="{{ $url }}" class="px-3 py-1 text-gray-600 hover:text-blue-600 hover:underline">{{ $page }}</a>
                    </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- -- Next Page Link -- -->
        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 text-blue-600 hover:underline">Next &rarr;</a>
        </li>
        @else
        <li>
            <span class="px-3 py-1 text-gray-100 cursor-not-allowed">Next &rarr;</span>
        </li>
        @endif
    </ul>
</nav>

@endif