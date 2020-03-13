<?php

namespace Sally\Dashboard\Domain\Statistic\Type;

abstract class AbstractDiagram extends AbstractType
{
    /**
     * @var DiagramItem\AbstractDiagramItem[]
     */
    protected $items = [];

    /**
     * @var DiagramItem\Factory
     */
    private $factory;

    public function __construct(string $name)
    {
        parent::__construct($name);
        $this->factory = new DiagramItem\Factory();
    }

    /**
     * Метод для заполнения диаграммы объектами.
     * В callback функции нужно вернуть массив объектов, которые вы хотите добавить.
     * Создать эти объекты можно через передаваемый аргумент $factory
     *
     * @param callable $callback(DiagramItem\Factory $factory): array
     */
    public function addItem(callable $callback): void
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
