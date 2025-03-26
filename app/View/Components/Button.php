<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public function __construct(
        public readonly string $type = 'button',
        public readonly bool $primary = false,
        public readonly bool $disabled = false,
        public readonly ?string $href = null,
    ) {}

    protected function getSize(): string 
    {
        return 'px-6 py-2';
    }

    private function getColor(): string 
    {
        if ($this->primary) {
            return 'border-yellow-400 bg-yellow-400 text-yellow-900 hover:bg-yellow-300';
        }
        if ($this->disabled) {
            return 'border-gray-300 bg-white text-gray-400 cursor-not-allowed';
        }

        return 'border-blue-500 bg-white text-blue-500 hover:bg-blue-50';
    }

    private function getCursor(): string
    {
        if ($this->disabled) {
            return 'cursor-not-allowed';
        }

        return 'cursor-pointer';
    }

    public function render(): View
    {
        return view('components.button', [
            'size' => $this->getSize(),
            'color' => $this->getColor(),
            'cursor' => $this->getCursor(),
        ]);
    }
}
