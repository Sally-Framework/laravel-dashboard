<?php
/**
 * Created by n0tm
 * Date: 22.03.2020
 */

namespace Tests\Domain\Statistic\Type\Diagram\Item;

use PHPUnit\Framework\TestCase;
use Sally\Dashboard\Domain\Statistic\Type\Diagram\Item;

class FactoryTest extends TestCase
{
	/**
	 * @var Item\Factory
	 */
	private $factory;

	public function setUp(): void
	{
		$this->factory = new Item\Factory();
	}

	public function testQuantity(): void
	{
		$quantityName = '::quantity::';
		$quantityValue = 100;
		$quantity = $this->factory->quantity($quantityName, $quantityValue);

		$this->assertEquals(new Item\Quantity($quantityName, $quantityValue), $quantity);
	}

	public function testQuantityGroup(): void
	{
		$quantityGroupName = '::quantity::';
		$quantityGroupValue = 100;
		$quantityGroupIndicator = '::indicator::';
		$quantityGroup = $this->factory->quantityGroup($quantityGroupName, $quantityGroupValue, $quantityGroupIndicator);

		$this->assertEquals(
			new Item\QuantityGroup($quantityGroupName, $quantityGroupValue, $quantityGroupIndicator),
			$quantityGroup
		);
	}
}