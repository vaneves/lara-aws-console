<?php

namespace App\Entities;

use Iterator;

class BreadcrumbCollection implements Iterator
{
    private array $items = [];
    private int $position = 0;

    public function add(Breadcrumb $breadcrumb): self 
    {
        $this->items[] = $breadcrumb;
        return $this;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current(): mixed
    {
        return $this->items[$this->position];
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        return isset($this->items[$this->position]);
    }

    public function isLast(): bool
    {
        return $this->position === count($this->items) - 1;
    }
}
