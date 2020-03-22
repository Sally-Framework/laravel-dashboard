<?php
/**
 * Created by n0tm
 * Date: 21.03.2020
 */

namespace Sally\Dashboard\Domain\Statistic\Interfaces\Type\Diagram\Item;

use Sally\Dashboard\Domain\Statistic\Type\Diagram\Item;

interface FactoryInterface
{
	public function quantity(string $name, int $quantity): Item\Quantity;
	public function quantityGroup(string $name, int $quantity, string $indicator): Item\QuantityGroup;
}