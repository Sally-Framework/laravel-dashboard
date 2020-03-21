<?php
/**
 * Created by n0tm
 * Date: 21.03.2020
 */

namespace Sally\Dashboard\Domain\Statistic\Interfaces;

use Sally\Dashboard\Domain\Statistic\Type;

interface CompositeInterface
{
	public function add(Type\AbstractType $item): void;

	/**
	 * @return Type\AbstractType[]
	 */
	public function getItems(): array;
}