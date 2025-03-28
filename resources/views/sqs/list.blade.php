<x-layout :breadcrumb-stack="$breadcrumbStack">
  <x-card>
    <x-card.header>
      <div class="mb-3 flex justify-between">
        <div>
          Queues <span class="font-medium text-base text-gray-500">({{ $queues->total() }})</span>
        </div>
        <div>
          <x-button-sm type="link" href="">Refresh</x-button.sm>
          <x-button-sm type="link" href="" primary>Create Queue</x-button.sm>
        </div>
      </div>
      <x-form.search name="search" />
    </x-card.header>
    <table class="min-w-full">
      <thead>
        <tr class="text-gray-600 text-left border-b border-gray-400">
          <th class="pb-2">Name</th>
          <th class="pb-2">Type</th>
          <th class="pb-2">Created At</th>
          <th class="pb-2">In Queue</th>
          <th class="pb-2">Processing</th>
        </tr>
      </thead>
      <tbody>
        @foreach($queues->items() as $queue)
        <tr class="border-b border-gray-200 hover:bg-gray-50">
          <td class="py-2">
            <a href="{{ route('sqs.view', ['name' => $queue->name]) }}" class="text-blue-600">{{ $queue->name }}</a>
          </td>
          <td class="py-2">{{ $queue->type }}</td>
          <td class="py-2">{{ $queue->created }}</td>
          <td class="py-2">{{ $queue->approximateNumberOfMessages }}</td>
          <td class="py-2">{{ $queue->approximateNumberOfMessagesNotVisible }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mt-6">
      {{ $queues->links() }}
    </div>
  </x-card>
</x-layout>