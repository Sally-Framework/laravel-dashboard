<?php
/**
 * Created by n0tm
 * Date: 21.03.2020
 */

namespace Tests\Domain\Statistic;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Sally\Dashboard\Domain\Statistic;

class DemoStatisticFillerTest extends TestCase
{
    /**
     * @var Statistic\Type\Factory|MockObject $factory
     */
    private $factory;

    /**
     * @var Statistic\Composite|MockObject $statistic
     */
    private $statistic;

    /**
     * @var Statistic\DemoStatisticFiller
     */
    private $handler;

    public function setUp()
    {
        $this->factory   = $this->createMock(Statistic\Interfaces\Type\FactoryInterface::class);
        $this->statistic = $this->createMock(Statistic\Interfaces\CompositeInterface::class);
        $this->handler   = new Statistic\DemoStatisticFiller($this->statistic, $this->factory);
    }

    public function testFill(): void
	{
		$commonStatisticItemsCount  = 5;
		$this->factory->expects($this->exactly($commonStatisticItemsCount))->method('getCommonFactory');

		$diagramStatisticItemsCount = 10;
        $this->factory->expects($this->exactly($diagramStatisticItemsCount))->method('getDiagramFactory');

		$totalStatisticItemsCount = $commonStatisticItemsCount + $diagramStatisticItemsCount;
		$this->statistic->expects($this->exactly($totalStatisticItemsCount))
			->method('add')
			->withAnyParameters();

		$this->handler->fill();
	}

	public function testGetStatisticItems(): void
    {
        $this->statistic->expects($this->once())->method('getItems');
        $this->handler->getStatisticItems();
    }
}
