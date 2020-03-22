<?php
/**
 * Created by n0tm
 * Date: 22.03.2020
 */

namespace Sally\Dashboard\Domain\Statistic\Interfaces\Type\Common;

use Sally\Dashboard\Domain\Statistic\Type\Common;

interface FactoryInterface
{
	public function text(string $name, string $value): Common\Text;
	public function table(string $name): Common\Table;
}