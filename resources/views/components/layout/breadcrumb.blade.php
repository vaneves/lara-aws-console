<div class="bg-white border-b-1 border-gray-300 text-gray-600 text-sm">
  <nav class="max-w-7xl mx-auto flex items-center space-x-2 p-3">
    @foreach ($breadcrumbs as $item)
      @if ($breadcrumbs->isLast())
        <span class="text-gray-500 font-semibold">{{ $item->label }}</span>
      @else
        <a href="{{ $item->link }}" class="text-blue-600 hover:text-blue-900 underline">{{ $item->label }}</a>
        <span class="text-gray-400"><i class="fa-solid fa-chevron-right"></i></span>
      @endif
    @endforeach
  </nav>
</div>