<?php
/**
 * Created by n0tm
 * Date: 22.03.2020
 */

namespace Tests\Domain\Statistic\Type;

use Sally\Dashboard\Domain\Statistic\Type;

/**
 * Class DiagramBarHorizontalTest
 * @package Tests\Domain\Statistic\Type
 * @property Type\DiagramBarHorizontal $type
 */
class DiagramBarHorizontalTest extends AbstractDiagramTest
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
		$this->assertContainsOnlyInstancesOf(Type\DiagramItem\Quantity::class, $items);
	}

	public function testGetName(): void
	{
		$this->assertSame(self::TEST_STATISTIC_NAME, $this->type->getName());
	}

	protected function getType(): Type\AbstractType
	{
		return new Type\DiagramBarHorizontal(self::TEST_STATISTIC_NAME, $this->factory);
	}
}