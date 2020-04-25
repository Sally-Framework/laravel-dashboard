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
		$this->typeFactory = new Type\Factory();
	}

	public function testGetCommonFactory(): void
	{
	    $commonFactory = $this->typeFactory->getCommonFactory();
		$this->assertEquals(new Type\Common\Factory(), $commonFactory);
		$this->assertSame($commonFactory, $this->typeFactory->getCommonFactory());
	}

	public function testGetDiagramFactory(): void
	{
	    $diagramFactory = $this->typeFactory->getDiagramFactory();
		$this->assertEquals(new Type\Diagram\Factory($this->itemFactory), $diagramFactory);
		$this->assertSame($diagramFactory, $this->typeFactory->getDiagramFactory());
	}

	public function testGetDiagramItemFactory(): void
    {
        $diagramItemFactory = $this->typeFactory->getDiagramItemFactory();
        $this->assertEquals($this->itemFactory, $diagramItemFactory);
        $this->assertSame($diagramItemFactory, $this->typeFactory->getDiagramItemFactory());
    }
}
