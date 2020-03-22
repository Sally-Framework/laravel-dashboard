<?php

namespace Sally\Dashboard\Domain\Statistic\Type\Diagram\Item;

class Quantity extends AbstractItem
{
    /**
     * @var int
     */
    protected $value;

    public function __construct(string $name, int $value)
    {
        parent::__construct($name);
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
