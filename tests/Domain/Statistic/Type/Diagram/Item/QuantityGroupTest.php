<?php
/**
 * Created by n0tm
 * Date: 22.03.2020
 */

namespace Tests\Domain\Statistic\Type\Common\Diagram\Item;

use Sally\Dashboard\Domain\Statistic\Type\Diagram\Item;

/**
 * Class QuantityGroupTest
 * @package Tests\Domain\Statistic\Type\Common\DiagramItem
 * @property Item\QuantityGroup $diagramItem
 */
class QuantityGroupTest extends AbstractItemTest
{
	private const TEST_QUANTITY_GROUP_VALUE     = 100;
	private const TEST_QUANTITY_GROUP_INDICATOR = '::indicator::';

	public function testGetName(): void
	{
		$this->assertEquals(self::TEST_DIAGRAM_ITEM_NAME, $this->diagramItem->getName());
	}

	public function testGetValue(): void
	{
		$this->assertEquals(self::TEST_QUANTITY_GROUP_VALUE, $this->diagramItem->getValue());
	}

	public function testGetIndicator(): void
	{
		$this->assertEquals(self::TEST_QUANTITY_GROUP_INDICATOR, $this->diagramItem->getIndicator());
	}

	protected function getDiagramItem(): Item\AbstractItem
	{
		return new Item\QuantityGroup(
			self::TEST_DIAGRAM_ITEM_NAME,
			self::TEST_QUANTITY_GROUP_VALUE,
			self::TEST_QUANTITY_GROUP_INDICATOR
		);
	}
}