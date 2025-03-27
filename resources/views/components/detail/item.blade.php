<div class="px-3 border-l-1 border-gray-300">
  <div class="font-semibold">{{ $label }}</div>
  <div>
    @if ($copyButton)
      <button type="button" class="text-blue-600 cursor-pointer copy-clipboard" data-copy="{{ $value }}">
        <i class="fa-regular fa-copy"></i>
      </button>
    @endif
    {{ $value }}
  </div>
</div>