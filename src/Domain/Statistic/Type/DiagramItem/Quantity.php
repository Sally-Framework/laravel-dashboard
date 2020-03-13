<?php

namespace Sally\Dashboard\Domain\Statistic\Type\DiagramItem;

class Quantity extends AbstractDiagramItem 
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

    public function value(): int 
    {
        return $this->value;
    }
}
