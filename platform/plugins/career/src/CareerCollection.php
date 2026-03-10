<?php

namespace Botble\Career;

use Illuminate\Contracts\Support\Arrayable;

class CareerCollection implements Arrayable
{
    protected array $items = [];

    public function push(CareerItem $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    public function toArray(): array
    {
        return $this->items;
    }
}
