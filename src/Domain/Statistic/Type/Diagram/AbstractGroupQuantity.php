<?php
/**
 * Created by n0tm
 * Date: 21.03.2020
 */

namespace Sally\Dashboard\Domain\Statistic\Type\Diagram;

abstract class AbstractGroupQuantity extends AbstractDiagram
{
	public function addItem(string $name, int $quantity, string $indicator): void
	{
		$this->items[] = $this->factory->quantityGroup($name, $quantity, $indicator);
	}
}