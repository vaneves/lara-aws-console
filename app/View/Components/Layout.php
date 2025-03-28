<?php

namespace App\View\Components;

use App\Http\Controllers\BreadcrumbStack;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    public function __construct(
        public readonly ?BreadcrumbStack $breadcrumbStack = null
    ) {}

    public function render(): View
    {
        return view('components.layout', [
            'breadcrumbs' => $this->breadcrumbStack?->getCollection(),
        ]);
    }
}
