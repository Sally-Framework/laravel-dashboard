<?php

namespace Tests\Domain\Statistic\Type\Common;

use PHPUnit\Framework\TestCase;
use Sally\Dashboard\Domain\Statistic\Type\AbstractType;

abstract class AbstractTypeTest extends TestCase
{
	protected const TEST_STATISTIC_NAME = '::some name::';

	/**
	 * @var AbstractType
	 */
	protected $type;

	public function setUp(): void
	{
		$this->type = $this->getType();
	}

	abstract public function testGetName(): void;
	abstract protected function getType(): AbstractType;
}
