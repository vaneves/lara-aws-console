<?php

namespace App\Entities;

readonly class QueueRedrivePolicy
{
    public function __construct(
        public int $maxReceiveCount,
        public ?string $deadLetterTargetArn = null,
    ) {}
    public static function fromJsonString(string $json): self
    {
        $object = json_decode($json, false);
        
        return new self(
            $object->maxReceiveCount,
            $object->deadLetterTargetArn,
        );
    }
}
