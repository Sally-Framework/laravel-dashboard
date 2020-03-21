<?php
/**
 * Created by n0tm
 * Date: 21.03.2020
 */

namespace Sally\Dashboard\Domain\Statistic\Interfaces\Type;

use Sally\Dashboard\Domain\Statistic\Type;

interface FactoryInterface
{
	public function text(string $name, $value): Type\Text;
	public function table(string $name): Type\Table;
	public function diagramPie(string $name): Type\DiagramPie;
	public function diagramDoughnut(string $name): Type\DiagramDoughnut;
	public function diagramBarVertical(string $name): Type\DiagramBarVertical;
	public function diagramBarHorizontal(string $name): Type\DiagramBarHorizontal;
	public function diagramLine(string $name): Type\DiagramLine;
}