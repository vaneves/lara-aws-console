@if ($type == 'link')
  <a 
    href="{{ $href }}"
    class="{{ $size }} rounded-3xl {{ $cursor }} border {{ $color }} shadow-sm transition font-normal"
  >{{ $slot }}</a>
@else
  <button 
    type="{{ $type }}"
    class="{{ $size }} rounded-3xl {{ $cursor }} border {{ $color }} shadow-sm transition font-normal"
  >{{ $slot }}</button>
@endif