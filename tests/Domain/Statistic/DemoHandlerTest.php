<?php
/**
 * Created by n0tm
 * Date: 21.03.2020
 */

namespace Tests\Domain\Statistic;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Sally\Dashboard\Domain\Statistic\Composite;
use Sally\Dashboard\Domain\Statistic\DemoHandler;
use Sally\Dashboard\Domain\Statistic\Interfaces\CompositeInterface;
use Sally\Dashboard\Domain\Statistic\Interfaces\Type\FactoryInterface;
use Sally\Dashboard\Domain\Statistic\Type\Factory;

class DemoHandlerTest extends TestCase
{
	public function testHandle(): void
	{
		/** @var Factory|MockObject $factory */
		$factory   = $this->createMock(FactoryInterface::class);
		/** @var Composite|MockObject $statistic */
		$statistic = $this->createMock(CompositeInterface::class);

		// Генерация карточек
		$textCardLimitCount = 3;
		$factory->expects($this->exactly($textCardLimitCount))
			->method('text')
			->withAnyParameters();

		// Генерация таблиц
		$tablesLimitCount = 2;
		$factory->expects($this->exactly($tablesLimitCount))
			->method('table')
			->withAnyParameters();

		// Генерация pie графиков
		$pieDiagramLimit = 3;
		$factory->expects($this->exactly($pieDiagramLimit))
			->method('diagramPie')
			->withAnyParameters();

		$statistic->expects($this->exactly($textCardLimitCount + $tablesLimitCount + $pieDiagramLimit))
			->method('add')
			->withAnyParameters();

		$demoHandler = new DemoHandler($statistic, $factory);
		$demoHandler->getItems();
	}
}