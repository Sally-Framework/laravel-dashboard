<?php
/**
 * Created by n0tm
 * Date: 21.03.2020
 */

namespace Tests\Domain\Statistic\Type;

use PHPUnit\Framework\MockObject\MockObject;
use Sally\Dashboard\Domain\Statistic\Interfaces\Type\DiagramItem\FactoryInterface;

abstract class AbstractDiagramTest extends AbstractTypeTest
{
	/**
	 * @var FactoryInterface|MockObject
	 */
	protected $factory;

	public function setUp(): void
	{
		$this->factory = $this->createMock(FactoryInterface::class);
		parent::setUp();
	}

	abstract public function testAddAndGetItems(): void;
}