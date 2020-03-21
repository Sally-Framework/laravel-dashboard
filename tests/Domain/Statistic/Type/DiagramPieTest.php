<?php
/**
 * Created by n0tm
 * Date: 21.03.2020
 */

namespace Tests\Domain\Statistic\Type;

use Sally\Dashboard\Domain\Statistic\Interfaces\Type\DiagramItem\FactoryInterface;
use Sally\Dashboard\Domain\Statistic\Type\DiagramItem\Factory;
use Sally\Dashboard\Domain\Statistic\Type\DiagramPie;

class DiagramPieTest extends AbstractTypeTest
{
	private const TEST_PIE_NAME = '::some name::';

	/**
	 * @var DiagramPie
	 */
	private $pie;

	/**
	 * @var FactoryInterface
	 */
	private $factory;

	protected function setUp(): void
	{
		$this->factory = new Factory();
		$this->pie = new DiagramPie(self::TEST_PIE_NAME, $this->factory);
	}

	public function testGetName(): void
	{
		$this->assertSame(self::TEST_PIE_NAME, $this->pie->getName());
	}

	public function testAddAndGetItems(): void
	{
		$expectedItems = [
			$this->factory->quantity('::some test quantity::', 100),
			$this->factory->quantityGroup('::some test quantity::', 100, '::indicator::'),
		];

		$this->pie->addItems(function () use ($expectedItems): array {
			return $expectedItems;
		});

		$this->assertSame($expectedItems, $this->pie->getItems());
	}
}