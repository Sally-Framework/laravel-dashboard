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
    private $factory;

    public function __construct(string $name, FactoryInterface $factory)
    {
        parent::__construct($name);
        $this->factory = $factory;
    }

    /**
     * @todo: Неявный метод, нужно его переделать.
     * Метод для заполнения диаграммы объектами.
     * В callback функции нужно вернуть массив объектов, которые вы хотите добавить.
     * Создать эти объекты можно через передаваемый аргумент $factory
     *
     * @param callable $callback(FactoryInterface $factory): array
     */
    public function addItems(callable $callback): void
    {
        $items = call_user_func($callback, $this->factory);
        foreach ($items as $item) {
            $this->items[] = $item;
        }
    }

    /**
     * @return DiagramItem\AbstractDiagramItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
}
