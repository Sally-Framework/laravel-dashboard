<?php

namespace Sally\Dashboard\Domain\Statistic\Type;

use Sally\Dashboard\Domain\Statistic\Interfaces\Type\FactoryInterface;

class Factory implements FactoryInterface
{
    public function text(string $name, $value): Text 
    {
        return new Text($name, $value);
    }

    public function table(string $name): Table 
    {
        return new Table($name);
    }

    public function diagramPie(string $name): DiagramPie 
    {
        return new DiagramPie($name);
    }

    public function diagramDoughnut(string $name): DiagramDoughnut 
    {
        return new DiagramDoughnut($name);
    }

    public function diagramBarVertical(string $name): DiagramBarVertical 
    {
        return new DiagramBarVertical($name);
    }

    public function diagramBarHorizontal(string $name): DiagramBarHorizontal 
    {
        return new DiagramBarHorizontal($name);
    }

    public function diagramLine(string $name): DiagramLine 
    {
        return new DiagramLine($name);
    }
}
