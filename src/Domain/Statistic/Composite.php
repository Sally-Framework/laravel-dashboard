<?php

namespace Sally\Dashboard\Domain\Statistic;

use Sally\Dashboard\Domain\Statistic\Interfaces\CompositeInterface;

class Composite implements CompositeInterface
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
