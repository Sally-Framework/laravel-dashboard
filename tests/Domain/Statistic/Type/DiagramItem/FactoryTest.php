<?php
/**
 * Created by n0tm
 * Date: 22.03.2020
 */

namespace Tests\Domain\Statistic\Type\DiagramItem;

use PHPUnit\Framework\TestCase;
use Sally\Dashboard\Domain\Statistic\Type\DiagramItem\Factory;
use Sally\Dashboard\Domain\Statistic\Type\DiagramItem\Quantity;
use Sally\Dashboard\Domain\Statistic\Type\DiagramItem\QuantityGroup;

class FactoryTest extends TestCase
{
	/**
	 * @var Factory
	 */
	private $factory;

	public function setUp(): void
	{
		$this->factory = new Factory();
	}

	public function testQuantity(): void
	{
		$quantityName = '::quantity::';
		$quantityValue = 100;
		$quantity = $this->factory->quantity($quantityName, $quantityValue);

		$this->assertEquals(new Quantity($quantityName, $quantityValue), $quantity);
	}

	public function testQuantityGroup(): void
	{
		$quantityGroupName = '::quantity::';
		$quantityGroupValue = 100;
		$quantityGroupIndicator = '::indicator::';
		$quantityGroup = $this->factory->quantityGroup($quantityGroupName, $quantityGroupValue, $quantityGroupIndicator);

		$this->assertEquals(
			new QuantityGroup($quantityGroupName, $quantityGroupValue, $quantityGroupIndicator),
			$quantityGroup
		);
	}
}