<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="bg-gray-100 min-h-screen">
    <x-layout.menu>
        <x-layout.menu-item href="/home" active>Services</x-menu-item>
        <x-layout.menu-item href="https://github.com/vaneves/lara-aws-console" new-window>GitHub</x-menu-item>
    </x-layout.menu>
    @if (isset($breadcrumbs))
      <x-layout.breadcrumb :breadcrumbs="$breadcrumbs" />
    @endif
    <main class="p-3 pt-6 max-w-7xl mx-auto">
      {{ $slot }}
    </main>
  </body>
</html>