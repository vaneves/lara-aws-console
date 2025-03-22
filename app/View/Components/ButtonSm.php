<?php

namespace App\View\Components;

class ButtonSm extends Button
{
    protected function getSize(): string 
    {
        return 'text-sm px-4 py-1';
    }
}
