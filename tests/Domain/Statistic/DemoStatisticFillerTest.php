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
	public function testGetFilled(): void
	{
		/** @var Statistic\Type\Factory|MockObject $factory */
		$factory   = $this->createMock(Statistic\Interfaces\Type\FactoryInterface::class);
		/** @var Statistic\Composite|MockObject $statistic */
		$statistic = $this->createMock(Statistic\Interfaces\CompositeInterface::class);

		$commonStatisticItemsCount  = 5;
		$factory->expects($this->exactly($commonStatisticItemsCount))->method('createCommon');

		$diagramStatisticItemsCount = 8;
		$factory->expects($this->exactly($diagramStatisticItemsCount))->method('createDiagram');

		$totalStatisticItemsCount = $commonStatisticItemsCount + $diagramStatisticItemsCount;
		$statistic->expects($this->exactly($totalStatisticItemsCount))
			->method('add')
			->withAnyParameters();

		$demoHandler = new Statistic\DemoStatisticFiller($statistic, $factory);
		$demoHandler->getFilled();
	}
}
