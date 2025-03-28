<?php

namespace App\Http\Controllers;

use App\Entities\Breadcrumb;
use App\Entities\BreadcrumbCollection;

class BreadcrumbStackForHome implements BreadcrumbStack
{
    protected BreadcrumbCollection $collection;

    public function __construct()
    {
        $this->collection = new BreadcrumbCollection();
        $this->add(
            label: 'Home',
            link: route('home'),
        );
    }

    public function add(string $label, ?string $link = null): void 
    {
        $this->collection->add(
            new Breadcrumb($label, $link)
        );
    }

    public function getCollection(): BreadcrumbCollection
    {
        return $this->collection;
    }
}
