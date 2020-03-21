<?php
/**
 * Created by n0tm
 * Date: 22.03.2020
 */

namespace Tests\Domain\Statistic\Type\DiagramItem;

use Sally\Dashboard\Domain\Statistic\Type\DiagramItem\AbstractDiagramItem;
use Sally\Dashboard\Domain\Statistic\Type\DiagramItem\Quantity;

/**
 * Class QuantityTest
 * @package Tests\Domain\Statistic\Type\DiagramItem
 * @property Quantity $diagramItem
 */
class QuantityTest extends AbstractDiagramItemTest
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

	protected function getDiagramItem(): AbstractDiagramItem
	{
		return new Quantity(self::TEST_DIAGRAM_ITEM_NAME, self::TEST_DIAGRAM_ITEM_VALUE);
	}
}