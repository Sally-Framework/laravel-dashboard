<?php

namespace Sally\Dashboard\Domain\Statistic\Type\DiagramItem;

class QuantityGroup extends Quantity 
{
    /**
     * @var string
     */
    private $indicator;

    public function __construct(string $name, int $value, string $indicator) 
    {
        parent::__construct($name, $value);
        $this->indicator = $indicator;
    }

    public function getIndicator(): string
    {
        return $this->indicator;
    }

}
