<?php

namespace Sally\Dashboard\Domain\Statistic;

use Sally\Dashboard\Domain\Statistic\Type;

class StatisticCreator
{
    public static function createText(string $name, string $value): Type\Common\Text
    {
        return self::getFactory()->getCommonFactory()->text($name, $value);
    }

    /**
     * @param string $name
     * @param string[] $headers
     * @param string[] $rows
     * @return Type\Common\Table
     */
    public static function createTable(string $name, array $headers, array $rows): Type\Common\Table
    {
        $table = self::getFactory()->getCommonFactory()->table($name);
        $table->setHeaders($headers);

        foreach ($rows as $row) {
            $table->addRow($row);
        }

        return $table;
    }

    public static function createDiagramPie(string $name, array $items): Type\Diagram\Pie
    {
        $pie = self::getFactory()->getDiagramFactory()->pie($name);
        return self::getFilledQuantityDiagram($pie, $items);
    }

    public static function createDiagramDoughnut(string $name, array $items): Type\Diagram\Doughnut
    {
        $doughnut = self::getFactory()->getDiagramFactory()->doughnut($name);
        return self::getFilledQuantityDiagram($doughnut, $items);
    }

    public static function createDiagramBarVertical(string $name, array $items): Type\Diagram\BarVertical
    {
        $barVertical = self::getFactory()->getDiagramFactory()->barVertical($name);
        return self::getFilledQuantityDiagram($barVertical, $items);
    }

    public static function createDiagramBarHorizontal(string $name, array $items): Type\Diagram\BarHorizontal
    {
        $barHorizontal = self::getFactory()->getDiagramFactory()->barHorizontal($name);
        return self::getFilledQuantityDiagram($barHorizontal, $items);
    }

    public static function createDiagramLine(string $name, array $items): Type\Diagram\Line
    {
        $line = self::getFactory()->getDiagramFactory()->line($name);
        return self::getFilledQuantityGroupDiagram($line, $items);
    }

    public static function createDiagramBarGrouped(string $name, array $items): Type\Diagram\BarGrouped
    {
        $barGrouped = self::getFactory()->getDiagramFactory()->barGrouped($name);
        return self::getFilledQuantityGroupDiagram($barGrouped, $items);
    }

    private static function getFilledQuantityDiagram(Type\Diagram\AbstractQuantity $diagram, array $items): Type\Diagram\AbstractQuantity
    {
        $filledDiagram = clone $diagram;
        foreach ($items as $itemName => $itemValue) {
            $filledDiagram->addItem($itemName, $itemValue);
        }

        return $filledDiagram;
    }

    private static function getFilledQuantityGroupDiagram(Type\Diagram\AbstractGroupQuantity $diagram, array $items): Type\Diagram\AbstractGroupQuantity
    {
        $filledDiagram = clone $diagram;
        foreach ($items as $indicator => $itemValues) {
            foreach ($itemValues as $itemName => $itemValue) {
                $filledDiagram->addItem($itemName, $itemValue, $indicator);
            }
        }

        return $filledDiagram;
    }

    private static function getFactory(): Interfaces\Type\FactoryInterface
    {
        return new Type\Factory();
    }
}
