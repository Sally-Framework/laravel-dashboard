<?php
/**
 * Created by n0tm
 * Date: 22.03.2020
 */

namespace Sally\Dashboard\Domain\Statistic\Type\Common;

use Sally\Dashboard\Domain\Statistic\Interfaces\Type\Common\FactoryInterface;
use Sally\Dashboard\Domain\Statistic\Type\Common;

class Factory implements FactoryInterface
{
	public function text(string $name, string $value): Common\Text
	{
		return new Common\Text($name, $value);
	}

	public function table(string $name): Common\Table
	{
		return new Common\Table($name);
	}
}