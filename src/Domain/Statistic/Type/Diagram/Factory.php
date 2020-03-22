<?php

namespace Sally\Dashboard\Domain\Statistic\Type\Diagram;

use Sally\Dashboard\Domain\Statistic\Interfaces\Type;
use Sally\Dashboard\Domain\Statistic\Type\Diagram;

class Factory implements Type\Diagram\FactoryInterface
{
	/**
	 * @var Type\Diagram\Item\FactoryInterface
	 */
	private $factory;

	public function __construct(Type\Diagram\Item\FactoryInterface $factory)
	{
		$this->factory = $factory;
	}

	public function barHorizontal(string $name): Diagram\BarHorizontal
	{
		return new BarHorizontal($name, $this->factory);
	}

	public function barVertical(string $name): Diagram\BarVertical
	{
		return new BarVertical($name, $this->factory);
	}

	public function doughnut(string $name): Diagram\Doughnut
	{
		return new Doughnut($name, $this->factory);
	}

	public function line(string $name): Diagram\Line
	{
		return new Line($name, $this->factory);
	}

	public function pie(string $name): Diagram\Pie
	{
		return new Pie($name, $this->factory);
	}
}
