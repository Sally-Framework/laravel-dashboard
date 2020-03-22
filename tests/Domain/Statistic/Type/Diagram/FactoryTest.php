<?php
/**
 * Created by n0tm
 * Date: 23.03.2020
 */

namespace Tests\Domain\Statistic\Type\Diagram;

use PHPUnit\Framework\TestCase;
use Sally\Dashboard\Domain\Statistic\Type\Diagram;

class FactoryTest extends TestCase
{
	private const TEST_DIAGRAM_NAME = '::name::';

	/**
	 * @var Diagram\Factory
	 */
	private $typeFactory;

	/**
	 * @var Diagram\Item\Factory
	 */
	private $itemFactory;

	public function setUp(): void
	{
		$this->itemFactory = new Diagram\Item\Factory();
		$this->typeFactory = new Diagram\Factory($this->itemFactory);
	}

	public function testBarHorizontal(): void
	{
		$this->assertEquals(
			new Diagram\BarHorizontal(self::TEST_DIAGRAM_NAME, $this->itemFactory),
			$this->typeFactory->barHorizontal(self::TEST_DIAGRAM_NAME)
		);
	}

	public function testBarVertical(): void
	{
		$this->assertEquals(
			new Diagram\BarVertical(self::TEST_DIAGRAM_NAME, $this->itemFactory),
			$this->typeFactory->barVertical(self::TEST_DIAGRAM_NAME)
		);
	}

	public function testDoughnut(): void
	{
		$this->assertEquals(
			new Diagram\Doughnut(self::TEST_DIAGRAM_NAME, $this->itemFactory),
			$this->typeFactory->doughnut(self::TEST_DIAGRAM_NAME)
		);
	}

	public function testLine(): void
	{
		$this->assertEquals(
			new Diagram\Line(self::TEST_DIAGRAM_NAME, $this->itemFactory),
			$this->typeFactory->line(self::TEST_DIAGRAM_NAME)
		);
	}

	public function testPie(): void
	{
		$this->assertEquals(
			new Diagram\Pie(self::TEST_DIAGRAM_NAME, $this->itemFactory),
			$this->typeFactory->pie(self::TEST_DIAGRAM_NAME)
		);
	}
}