<?php
/**
 * Created by n0tm
 * Date: 22.03.2020
 */

namespace Tests\Domain\Statistic\Type\Common\Diagram\Item;

use PHPUnit\Framework\TestCase;
use Sally\Dashboard\Domain\Statistic\Type\Diagram\Item\AbstractItem;

abstract class AbstractItemTest extends TestCase
{
	protected const TEST_DIAGRAM_ITEM_NAME = '::name::';

	/**
	 * @var AbstractItem
	 */
	protected $diagramItem;

	public function setUp(): void
	{
		$this->diagramItem = $this->getDiagramItem();
	}

	abstract public function testGetName(): void;
	abstract protected function getDiagramItem(): AbstractItem;
}