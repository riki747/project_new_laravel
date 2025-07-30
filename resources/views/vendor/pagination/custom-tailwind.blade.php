@if ($paginator->hasPages())
    <nav class="grid grid-cols-3 items-center mt-4 text-sm">
        <!---- Previous ---->
        <div class="text-left">
            @if ($paginator->onFirstPage())
            <span class="px-3 py-1 text-gray-400 cursor-not-allowed">&larr; Previous</span>
            @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 text-blue-600 hover:underline">&larr; Previous</a>
            @endif
        </div>

        <!---- Page Numbers ---->
        <div class="flex justify-center space-x-1">
            @foreach ($elements as $element)
            @if (is_string($element))
            <span class="px-2 py-1 text-gray-500">{{ $element }}</span>
            @endif

            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <span class="px-3 py-1 text-blue-600 font-semibold border-b-2 border-blue-600">{{ $page }}</span>
            @else
            <a href="{{ $url }}" class="px-3 py-1 text-gray-600 hover:text-blue-600 hover:underline">{{ $page }}</a>
            @endif
            @endforeach
            @endif
            @endforeach
        </div>

        <!---- Next ---->
        <div class="text-right">
            @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 text-blue-600 hover:underline">Next &rarr;</a>
            @else
            <span class="px-3 py-1 text-gray-400 cursor-not-allowed">Next &rarr;</span>
            @endif
        </div>
    </nav>
@endif