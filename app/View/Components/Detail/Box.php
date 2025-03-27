<?php

namespace App\View\Components\Detail;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Box extends Component
{
    public function __construct(
        public readonly ?string $title = null,
    ) {}

    public function render(): View
    {
        return view('components.detail.box');
    }
}
