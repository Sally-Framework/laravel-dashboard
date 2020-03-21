<?php
/**
 * Created by n0tm
 * Date: 21.03.2020
 */

namespace Tests\Domain\Statistic\Type;

use Sally\Dashboard\Domain\Statistic\Type;

/**
 * Class DiagramLineTest
 * @package Tests\Domain\Statistic\Type
 * @property Type\DiagramLine $type
 */
class DiagramLineTest extends AbstractDiagramTest
{
	public function testGetName(): void
	{
		$this->assertSame(self::TEST_STATISTIC_NAME, $this->type->getName());
	}

	public function testAddAndGetItems(): void
	{
		$this->assertEmpty($this->type->getItems());

		$itemName = '::name::';
		$itemQuantity = 100;
		$itemIndicator = '::indicator::';
		$this->factory
			->expects($this->once())
			->method('quantityGroup')
			->with($itemName, $itemQuantity, $itemIndicator);

		$this->type->addItem($itemName, $itemQuantity, $itemIndicator);
		$items = $this->type->getItems();
		$this->assertSame(1, count($items));
		$this->assertContainsOnlyInstancesOf(Type\DiagramItem\QuantityGroup::class, $items);
	}

	protected function getType(): Type\AbstractType
	{
		return new Type\DiagramLine(self::TEST_STATISTIC_NAME, $this->factory);
	}
}
