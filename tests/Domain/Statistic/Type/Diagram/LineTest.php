<?php
/**
 * Created by n0tm
 * Date: 21.03.2020
 */

namespace Tests\Domain\Statistic\Type\Diagram;

use Sally\Dashboard\Domain\Statistic\Type;

/**
 * Class DiagramLineTest
 * @package Tests\Domain\Statistic\Type\Common
 * @property Type\Diagram\Line $type
 */
class LineTest extends AbstractDiagramTest
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
		$this->assertContainsOnlyInstancesOf(Type\Diagram\Item\QuantityGroup::class, $items);
	}

	protected function getType(): Type\AbstractType
	{
		return new Type\Diagram\Line(self::TEST_STATISTIC_NAME, $this->factory);
	}
}
