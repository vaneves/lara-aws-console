<x-layout :breadcrumb-stack="$breadcrumbStack">
  <x-card>
    <x-card.header>
      Services
    </x-card.header>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
      @foreach ($services as $service)
      <a href="{{ route($service->slug) }}" class="cursor-pointer flex border-1 border-gray-400 hover:bg-blue-50 rounded-md px-4 py-2">
        <div class="py-1 pl-0 pr-3">
          <img class="size-8 rounded-3" src="{{ asset("assets/icons/{$service->slug}.svg") }}" alt="{{ $service->name }}" />
        </div>
        <div>
          <div>{{ $service->name }}</div>
          <div class="text-sm/1 text-gray-500">
            @if ($service->isRunning())
              <i class="text-xs text-green-500 fa-solid fa-circle mr-1"></i>
            @elseif ($service->isAvailable())
              <i class="text-xs text-blue-500 fa-solid fa-circle mr-1"></i>
            @else 
              <i class="text-xs text-gray-500 fa-solid fa-circle mr-1"></i>
            @endif
            {{ $service->status }}
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </x-card>
</x-layout>