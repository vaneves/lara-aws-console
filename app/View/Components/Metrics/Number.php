<?php

namespace App\View\Components\Metrics;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Number extends Component
{
    public function __construct(
        readonly public string $label,
        readonly public string $number,
    ) {}

    public function render(): View
    {
        return view('components.metrics.number');
    }
}
