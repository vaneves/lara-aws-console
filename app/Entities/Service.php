<?php

namespace App\Entities;

readonly class Service
{
    public function __construct(
        public string $name,
        public string $slug,
        public ServiceStatusEnum $status,
    ) {}

    public function isAvailable(): bool 
    {
        return $this->status == ServiceStatusEnum::Available;
    }

    public function isRunning(): bool 
    {
        return $this->status == ServiceStatusEnum::Running;
    }

    public function isDisabled(): bool 
    {
        return $this->status == ServiceStatusEnum::Disabled;
    }
}
