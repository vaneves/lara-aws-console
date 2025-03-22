<?php

namespace App\View\Components;

class ButtonXs extends Button
{
    protected function getSize(): string 
    {
        return 'text-xs px-3 py-1';
    }
}

