<?php

namespace App\View\Components\Detail;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
    public function __construct(
        public readonly string $label,
        public readonly string $value,
        public readonly bool $copyButton = false,
    ) {}

    public function render(): View
    {
        return view('components.detail.item');
    }
}
