<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Collapse extends Component
{
    public function __construct() {}

    public function render(): View
    {
        return view('components.collapse', [
            'hash' => Str::random(20),
        ]);
    }
}
