<?php

namespace App\Http\Controllers;

use App\Entities\BreadcrumbCollection;

interface BreadcrumbStack
{
    public function add(string $label, ?string $link = null): void;

    public function getCollection(): BreadcrumbCollection;
}
