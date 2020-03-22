<?php

namespace Sally\Dashboard\Domain\Statistic\Type\Diagram;

use Sally\Dashboard\Domain\Statistic\Interfaces\Type\Diagram\Item\FactoryInterface;
use Sally\Dashboard\Domain\Statistic\Type\AbstractType;

abstract class AbstractDiagram extends AbstractType
{
    /**
     * @var Item\AbstractItem[]
     */
    protected $items = [];

    /**
     * @var FactoryInterface
     */
    protected $factory;

    public function __construct(string $name, FactoryInterface $factory)
    {
        parent::__construct($name);
        $this->factory = $factory;
    }

    /**
     * @return Item\AbstractItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
