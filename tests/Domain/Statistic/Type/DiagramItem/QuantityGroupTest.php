<?php
/**
 * Created by n0tm
 * Date: 22.03.2020
 */

namespace Tests\Domain\Statistic\Type\DiagramItem;

use Sally\Dashboard\Domain\Statistic\Type\DiagramItem;

/**
 * Class QuantityGroupTest
 * @package Tests\Domain\Statistic\Type\DiagramItem
 * @property DiagramItem\QuantityGroup $diagramItem
 */
class QuantityGroupTest extends AbstractDiagramItemTest
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

	protected function getDiagramItem(): DiagramItem\AbstractDiagramItem
	{
		return new DiagramItem\QuantityGroup(
			self::TEST_DIAGRAM_ITEM_NAME,
			self::TEST_QUANTITY_GROUP_VALUE,
			self::TEST_QUANTITY_GROUP_INDICATOR
		);
	}
}