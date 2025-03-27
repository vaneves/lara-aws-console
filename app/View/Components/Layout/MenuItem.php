<?php 

namespace App\View\Components\Layout;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuItem extends Component
{
    public function __construct(
        public readonly string $href, 
        public readonly bool $active = false,
        public readonly bool $newWindow = false,
    ) {}

    private function getTarget(): string 
    {
        return $this->newWindow ? 'target="_blank"' : '';
    }

    public function render(): View
    {
        return view('components.layout.menu-item', [
            'target' => $this->getTarget()
        ]);
    }
}