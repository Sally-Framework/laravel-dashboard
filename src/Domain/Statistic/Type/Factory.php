<?php
/**
 * Created by n0tm
 * Date: 22.03.2020
 */

namespace Sally\Dashboard\Domain\Statistic\Type;

use Sally\Dashboard\Domain\Statistic\Interfaces\Type;

class Factory implements Type\FactoryInterface
{
	/**
	 * @var Type\Diagram\Item\FactoryInterface
	 */
	private $itemFactory;

	public function __construct(Type\Diagram\Item\FactoryInterface $itemFactory)
	{
		$this->itemFactory = $itemFactory;
	}

	public function createCommon(): Type\Common\FactoryInterface
	{
		return new Common\Factory();
	}

	public function createDiagram(): Type\Diagram\FactoryInterface
	{
		return new Diagram\Factory($this->itemFactory);
	}
}