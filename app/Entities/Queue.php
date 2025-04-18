<?php

namespace App\Entities;

use Carbon\Carbon;

readonly class Queue
{
    public function __construct(
        public string $name,
        public string $url,
        public string $queueArn,
        public QueueTypeEnum $type,
        public int $approximateNumberOfMessages,
        public int $approximateNumberOfMessagesNotVisible,
        public int $approximateNumberOfMessagesDelayed,
        public Carbon $created,
        public int $delaySeconds,
        public Carbon $lastModified,
        public int $maximumMessageSize,
        public int $messageRetentionPeriod,
        public int $receiveMessageWaitTimeSeconds,
        public int $visibilityTimeout,
        public bool $sqsManagedSseEnabled,
        public bool $contentBasedDeduplication = false,
        public bool $highThroughputModeEnabled = false,
        public ?string $deduplicationScope = null,
        public ?QueueRedrivePolicy $redrivePolicy = null,
    ) {}

    private static function extractNameFromUrl(string $queueUrl): string
    {
        return pathinfo($queueUrl)['filename'];
    }

    private static function getTypeFromArn(string $arn): QueueTypeEnum
    {
        return strpos($arn, '.fifo') !== false ? QueueTypeEnum::Fifo : QueueTypeEnum::Standard;
    }

    public static function fromArrayAttributes(string $queueUrl, array $attributes): self
    {
        // dd($attributes);
        return new self(
            self::extractNameFromUrl($queueUrl), 
            $queueUrl,
            $attributes['QueueArn'],
            self::getTypeFromArn($attributes['QueueArn']),
            (int)$attributes['ApproximateNumberOfMessages'],
            (int)$attributes['ApproximateNumberOfMessagesNotVisible'],
            (int)$attributes['ApproximateNumberOfMessagesDelayed'],
            Carbon::createFromTimestamp($attributes['CreatedTimestamp']),
            (int)$attributes['DelaySeconds'],
            Carbon::createFromTimestamp($attributes['LastModifiedTimestamp']),
            (int)$attributes['MaximumMessageSize'],
            (int)$attributes['MessageRetentionPeriod'],
            (int)$attributes['ReceiveMessageWaitTimeSeconds'],
            (int)$attributes['VisibilityTimeout'],
            bool_in_array($attributes, 'SqsManagedSseEnabled'),
            bool_in_array($attributes, 'ContentBasedDeduplication'),
            bool_in_array($attributes, 'HighThroughputModeEnabled'),
            $attributes['DeduplicationScope'] ?? null,
            self::mountQueueRedrivePolicy($attributes),
        );
    }

    private static function mountQueueRedrivePolicy(array $attributes): ?QueueRedrivePolicy {
        if (! isset($attributes['RedrivePolicy'])) {
            return null;
        }

        return QueueRedrivePolicy::fromJsonString($attributes['RedrivePolicy']);
    }
}
