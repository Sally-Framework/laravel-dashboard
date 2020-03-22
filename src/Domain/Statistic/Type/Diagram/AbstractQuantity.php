<?php
/**
 * Created by n0tm
 * Date: 21.03.2020
 */

namespace Sally\Dashboard\Domain\Statistic\Type\Diagram;

abstract class AbstractQuantity extends AbstractDiagram
{
	public function addItem(string $name, int $quantity): void
	{
		$this->items[] = $this->factory->quantity($name, $quantity);
	}
}