<?php

namespace App\View\Components\Form;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Search extends Component
{
    public function __construct(
        public readonly string $name,
    ) {}

    public function render(): View
    {
        return view('components.form.search');
    }
}
