<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public function __construct(
        public readonly ?string $title = null,
        public readonly string $padding = '6',
    ) {}

    public function render(): View
    {
        return view('components.card');
    }
}
