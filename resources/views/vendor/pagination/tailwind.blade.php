@if ($paginator->hasPages())
  <div class="flex justify-between items-center mt-4">
    <div>
      @if ($paginator->onFirstPage())
        <x-button-sm disabled>Previous</x-button-sm>
      @else
        <x-button-sm type="link" href="{{ $paginator->previousPageUrl() }}">Previous</x-button-sm>
      @endif
    </div>

    <div>
      @foreach ($elements as $element)
        @if (is_string($element))
          <span class="text-gray-400">{{ $element }}</span>
        @elseif (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <x-button-sm disabled>{{ $page }}</x-button-sm>
            @else
              <x-button-sm type="link" href="{{ $url }}">{{ $page }}</x-button-sm>
            @endif
          @endforeach
        @endif
      @endforeach
    </div>

    <div>
      @if ($paginator->hasMorePages())
        <x-button-sm type="link" href="{{ $paginator->nextPageUrl() }}">Next</x-button-sm>
      @else
        <x-button-sm disabled>Next</x-button-sm>
      @endif
    </div>
  </div>
@endif
