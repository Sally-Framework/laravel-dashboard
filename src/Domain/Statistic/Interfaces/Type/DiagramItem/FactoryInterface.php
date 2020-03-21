<?php
/**
 * Created by n0tm
 * Date: 21.03.2020
 */

namespace Sally\Dashboard\Domain\Statistic\Interfaces\Type\DiagramItem;

use Sally\Dashboard\Domain\Statistic\Type\DiagramItem;

interface FactoryInterface
{
	public function quantity(string $name, int $quantity): DiagramItem\Quantity;
	public function quantityGroup(string $name, int $quantity, string $indicator): DiagramItem\QuantityGroup;
}