<!doctype html>
  <html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="bg-gray-100 min-h-screen">
    <nav class="bg-white shadow p-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-gray-800">Lara-AWS-Console</h1>
      <span class="text-gray-500">LocalStack Interface</span>
    </nav>
    <main class="p-6 max-w-6xl mx-auto">
      {{ $slot }}
    </main>
  </body>
</html>