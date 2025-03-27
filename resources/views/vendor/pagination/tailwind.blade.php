@if ($paginator->hasPages())

  <nav class="isolate inline-flex -space-x-px rounded-md shadow-xs text-xs font-normal" aria-label="Pagination">
    @if ($paginator->onFirstPage())
      <span class="rounded-l-md px-3 py-2 text-gray-400 ring-1 ring-gray-300 ring-inset">
        <span class="sr-only">Previous</span>
        <i class="fa-solid fa-chevron-left"></i>
      </span>
    @else
      <a href="{{ $paginator->previousPageUrl() }}" class="rounded-l-md px-3 py-2 text-gray-900 ring-1 ring-gray-300 ring-inset">
        <span class="sr-only">Previous</span>
        <i class="fa-solid fa-chevron-left"></i>
      </a>
    @endif

    @foreach ($elements as $element)
      @if (is_string($element))
      <span class="px-4 py-2 text-gray-700 ring-1 ring-gray-300 ring-inset focus:outline-offset-0">...</span>
      @elseif (is_array($element))
        @foreach ($element as $page => $url)
          @if ($page == $paginator->currentPage())
            <a href="#" aria-current="page" class="bg-gray-200 px-4 py-2 ring-1 ring-gray-300 ring-inset">{{ $page }}</a>
          @else
          <a href="{{ $url }}" class="px-4 py-2 text-gray-900 ring-1 ring-gray-300 ring-inset">{{ $page }}</a>
          @endif
        @endforeach
      @endif
    @endforeach
    
    @if ($paginator->hasMorePages())
      <a href="{{ $paginator->nextPageUrl() }}" class="rounded-r-md px-3 py-2 text-gray-900 ring-1 ring-gray-300 ring-inset">
        <span class="sr-only">Next</span>
        <i class="fa-solid fa-angle-right"></i>
      </a>
    @else
      <span class="rounded-r-md px-3 py-2 text-gray-400 ring-1 ring-gray-300 ring-inset">
        <span class="sr-only">Next</span>
        <i class="fa-solid fa-angle-right"></i>
      </span>
    @endif
  </nav>

@endif
