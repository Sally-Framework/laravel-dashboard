<?php
/**
 * Created by n0tm
 * Date: 22.03.2020
 */

namespace Tests\Domain\Statistic\Type\Diagram;

use Sally\Dashboard\Domain\Statistic\Type;

/**
 * Class DiagramBarHorizontalTest
 * @package Tests\Domain\Statistic\Type\Common
 * @property Type\Diagram\BarHorizontal $type
 */
class BarHorizontalTest extends AbstractDiagramTest
{
	public function testAddAndGetItems(): void
	{
		$this->assertEmpty($this->type->getItems());

		$itemName = '::name::';
		$itemQuantity = 100;
		$this->factory
			->expects($this->once())
			->method('quantity')
			->with($itemName, $itemQuantity);

		$this->type->addItem($itemName, $itemQuantity);
		$items = $this->type->getItems();
		$this->assertSame(1, count($items));
		$this->assertContainsOnlyInstancesOf(Type\Diagram\Item\Quantity::class, $items);
	}

	public function testGetName(): void
	{
		$this->assertSame(self::TEST_STATISTIC_NAME, $this->type->getName());
	}

	protected function getType(): Type\AbstractType
	{
		return new Type\Diagram\BarHorizontal(self::TEST_STATISTIC_NAME, $this->factory);
	}
}