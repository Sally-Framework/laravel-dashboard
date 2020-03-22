<?php
/**
 * Created by n0tm
 * Date: 22.03.2020
 */

namespace Tests\Domain\Statistic\Type\Common\Diagram\Item;

use Sally\Dashboard\Domain\Statistic\Type\Diagram\Item;

/**
 * Class QuantityTest
 * @package Tests\Domain\Statistic\Type\Common\DiagramItem
 * @property Item\Quantity $diagramItem
 */
class QuantityTest extends AbstractItemTest
{
	private const TEST_DIAGRAM_ITEM_VALUE = 100;

	public function testGetName(): void
	{
		$this->assertEquals(self::TEST_DIAGRAM_ITEM_NAME, $this->diagramItem->getName());
	}

	public function testGetValue(): void
	{
		$this->assertEquals(self::TEST_DIAGRAM_ITEM_VALUE, $this->diagramItem->getValue());
	}

	protected function getDiagramItem(): Item\AbstractItem
	{
		return new Item\Quantity(self::TEST_DIAGRAM_ITEM_NAME, self::TEST_DIAGRAM_ITEM_VALUE);
	}
}