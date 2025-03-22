<div class="bg-white rounded-2xl shadow p-{{ $padding }}">
  @if (isset($title))
  <h3 class="text-lg font-semibold text-gray-700 mb-4">{{ $title }}</h3>
  @endif
  {{ $slot }}
</div>