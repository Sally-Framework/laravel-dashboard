<?php

namespace Sally\Dashboard\Domain\Statistic;

class Composite
{
    /**
     * @var Type\AbstractType[]
     */
    private $items = [];

    public function add(Type\AbstractType $item): void
    {
        $this->items[] = $item;
    }

    /**
     * @return Type\AbstractType[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
