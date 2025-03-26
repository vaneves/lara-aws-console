@if ($type == 'link')
  <a 
    href="{{ $href }}"
    class="{{ $size }} rounded-3xl {{ $cursor }} border {{ $color }} shadow-sm transition"
  >{{ $slot }}</a>
@else
  <button 
    type="{{ $type }}"
    class="{{ $size }} rounded-3xl {{ $cursor }} border {{ $color }} shadow-sm transition"
  >{{ $slot }}</button>
@endif