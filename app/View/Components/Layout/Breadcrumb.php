<?php

namespace App\View\Components\Layout;

use App\Entities\BreadcrumbCollection;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public function __construct(
        public readonly BreadcrumbCollection $breadcrumbs
    ) {}

    public function render(): View
    {
        return view('components.layout.breadcrumb');
    }
}
