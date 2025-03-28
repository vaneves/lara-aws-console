<x-layout :breadcrumb-stack="$breadcrumbStack">
  <x-card>
    <x-card.header>
      <div class="mb-3 flex justify-between">
        <div>{{ $queue->name }}</div>
        <div>
          <x-button-sm type="link" href="">Edit</x-button.sm>
          <x-button-sm type="link" href="">Delete</x-button.sm>
          <x-button-sm type="link" href="">Purge</x-button.sm>
          <x-button-sm type="link" href="">Send and receive messages</x-button.sm>
          <x-button-sm type="link" href="">Start DLQ redrive</x-button.sm>
        </div>
      </div>
    </x-card.header>
    <x-detail.box title="Details">
      <x-detail.item-list>
        <x-detail.item label="Name" :value="$queue->name" copy-button />
        <x-detail.item label="Type" value="{{ $queue->type }}" />
        <x-detail.item label="ARN" :value="$queue->queueArn" copy-button />
        <x-detail.item label="URL" :value="$queue->url" copy-button />
        <x-detail.item label="Dead-letter queue" :value="$queue->redrivePolicy ? 'Enabled' : '-'" />
      </x-detail.item-list>
      <x-collapse>
        <x-detail.item-list>
          <x-detail.item label="Created" value="{{ $queue->created }}" />
          <x-detail.item label="Maximum message size" value="{{ byte_to_kb($queue->maximumMessageSize) }}" />
          <x-detail.item label="Last updated" value="{{ $queue->lastModified }}" />
          <x-detail.item label="Message retention period" value="{{ $queue->messageRetentionPeriod }}" />
          <x-detail.item label="Default visibility timeout" value="{{ $queue->visibilityTimeout }} seconds" />
          <x-detail.item label="Messages available" :value="$queue->approximateNumberOfMessages" />
          <x-detail.item label="Messages in flight (not available to other consumers)" :value="$queue->approximateNumberOfMessagesNotVisible" />
          <x-detail.item label="Delivery delay" :value="$queue->delaySeconds" />
          <x-detail.item label="Receive message wait time" :value="$queue->receiveMessageWaitTimeSeconds" />
          <x-detail.item label="Messages delayed" :value="$queue->approximateNumberOfMessagesDelayed" />
          <x-detail.item label="Content-based deduplication" :value="$queue->contentBasedDeduplication" />
          {{-- <x-detail.item label="High throughput FIFO" :value="$queue->contentBasedDeduplication" /> --}}
          <x-detail.item label="Deduplication scope" value="{{ $queue->deduplicationScope ?? '-' }}" />

          <x-detail.item label="FIFO throughput limit" value="-" />
          {{-- <x-detail.item label="Redrive allow policy" :value="$queue->redrivePolicy" /> --}}
        </x-detail.item-list>
      </x-collapse>
    </x-detail.box>
  </x-card>
</x-layout>