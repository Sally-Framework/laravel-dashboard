<?php
/**
 * Created by n0tm
 * Date: 22.03.2020
 */

namespace Sally\Dashboard\Domain\Statistic\Interfaces\Type\Diagram;

use Sally\Dashboard\Domain\Statistic\Type\Diagram;

interface FactoryInterface
{
	public function barHorizontal(string $name): Diagram\BarHorizontal;
	public function barVertical(string $name): Diagram\BarVertical;
	public function barGrouped(string $name): Diagram\BarGrouped;
	public function doughnut(string $name): Diagram\Doughnut;
	public function line(string $name): Diagram\Line;
	public function pie(string $name): Diagram\Pie;
}
