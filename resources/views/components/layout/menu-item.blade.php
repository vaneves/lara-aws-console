@if (! isset($mobile))
  @if ($active)
  <a href="{{ $href }}" {{ $target }} class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">{{ $slot }}</a>
  @else
  <a href="{{ $href }}" {{ $target }} class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">{{ $slot }}</a>
  @endif
@else
  @if ($active)
  <a href="{{ $href }}" {{ $target }} class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">{{ $slot }}</a>
  @else
  <a href="{{ $href }}" {{ $target }} class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">{{ $slot }}</a>
  @endif
@endif

