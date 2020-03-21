<?php
/**
 * Created by n0tm
 * Date: 21.03.2020
 */

namespace Tests\Domain\Statistic\Type;

use Sally\Dashboard\Domain\Statistic\Type;

/**
 * Class DiagramPieTest
 * @package Tests\Domain\Statistic\Type
 * @property Type\DiagramPie $type
 */
class DiagramPieTest extends AbstractDiagramTest
{
	public function testGetName(): void
	{
		$this->assertSame(self::TEST_STATISTIC_NAME, $this->type->getName());
	}

	public function testAddAndGetItems(): void
	{
		$this->assertEmpty($this->type->getItems());

		$itemName = '::some test name::';
		$itemQuantity = 100;
		$this->factory
			->expects($this->once())
			->method('quantity')
			->with($itemName, $itemQuantity);

		$this->type->addItem('::some test name::', 100);

		$items = $this->type->getItems();
		$this->assertSame(1, count($items));
		$this->assertContainsOnlyInstancesOf(Type\DiagramItem\Quantity::class, $items);
	}

	protected function getType(): Type\AbstractType
	{
		return new Type\DiagramPie(self::TEST_STATISTIC_NAME, $this->factory);
	}
}