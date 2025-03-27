<div class="rounded-xl border-1 border-gray-300 p-4">
  @if($title)
    <div class="text-xl font-semibold mb-4">{{ $title }}</div>
  @endif
  {{ $slot }}
</div>