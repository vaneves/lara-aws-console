<div class="mt-3">
  <div class="font-semibold hover:text-blue-600">
    <span class="cursor-pointer collapse-button collapse-show" id="{{ $hash }}-more" data-ref="{{ $hash }}">
      <i class="fa-regular fa-square-caret-right"></i> More
    </span>
    <span class="cursor-pointer collapse-button collapse-hide hidden" id="{{ $hash }}-hide" data-ref="{{ $hash }}">
      <i class="fa-regular fa-square-caret-down"></i> Hide
    </span>
  </div>
  <div class="hidden pt-3" id="{{ $hash }}-data">
    {{ $slot }}
  </div>
</div>