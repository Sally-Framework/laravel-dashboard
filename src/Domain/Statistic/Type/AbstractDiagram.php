<?php

namespace Sally\Dashboard\Domain\Statistic\Type;

use Sally\Dashboard\Domain\Statistic\Interfaces\Type\DiagramItem\FactoryInterface;

abstract class AbstractDiagram extends AbstractType
{
    /**
     * @var DiagramItem\AbstractDiagramItem[]
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
     * @return DiagramItem\AbstractDiagramItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
