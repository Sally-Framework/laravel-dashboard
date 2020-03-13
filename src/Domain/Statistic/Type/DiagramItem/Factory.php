<?php

namespace Sally\Dashboard\Domain\Statistic\Type\DiagramItem;

class Factory
{
    public function quantity(string $name, int $quantity): Quantity 
    {
        return new Quantity($name, $quantity);
    }

    public function quantityGroup(string $name, int $quantity, string $indicator): QuantityGroup 
    {
        return new QuantityGroup($name, $quantity, $indicator);
    }
}
