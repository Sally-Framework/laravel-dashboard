<?php
/**
 * Created by n0tm
 * Date: 23.03.2020
 */

namespace Tests\Domain\Statistic;

use PHPUnit\Framework\TestCase;
use Sally\Dashboard\Domain\Statistic\Type;
use Sally\Dashboard\Domain\Statistic\Interfaces;

class FactoryTest extends TestCase
{
	/**
	 * @var Interfaces\Type\FactoryInterface
	 */
	private $typeFactory;

	/**
	 * @var Interfaces\Type\Diagram\Item\FactoryInterface
	 */
	private $itemFactory;

	public function setUp(): void
	{
		$this->itemFactory = new Type\Diagram\Item\Factory();
		$this->typeFactory = new Type\Factory($this->itemFactory);
	}

	public function testCreateCommon(): void
	{
		$this->assertEquals(new Type\Common\Factory(), $this->typeFactory->createCommon());
	}

	public function testCreateDiagram(): void
	{
		$this->assertEquals(new Type\Diagram\Factory($this->itemFactory), $this->typeFactory->createDiagram());
	}
}