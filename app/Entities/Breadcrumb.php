<?php

namespace App\Entities;

readonly class Breadcrumb
{
    public function __construct(
        public string $label,
        public ?string $link = null,
    ) {}
}
