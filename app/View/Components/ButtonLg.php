<?php

namespace App\View\Components;

class ButtonLg extends Button
{
    protected function getSize(): string 
    {
        return 'text-lg px-8 py-3';
    }
}
