<?php

namespace App\View\Components\Detail;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemList extends Component
{
    public function __construct() {}

    public function render(): View
    {
        return view('components.detail.item-list');
    }
}
