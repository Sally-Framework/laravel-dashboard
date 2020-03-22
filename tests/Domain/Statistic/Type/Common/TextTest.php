<?php

namespace Tests\Domain\Statistic\Type\Common;

use Sally\Dashboard\Domain\Statistic\Type;

/**
 * Class TextTest
 * @package Tests\Domain\Statistic\Type\Common
 * @property Type\Common\Text $type
 */
class TextTest extends AbstractTypeTest
{
    private const TEST_TEXT_VALUE = '::some value::';

	public function testGetName(): void
	{
		$this->assertSame(self::TEST_STATISTIC_NAME, $this->type->getName());
	}

	public function testGetValue(): void
	{
		$this->assertSame(self::TEST_TEXT_VALUE, $this->type->getValue());
	}

	protected function getType(): Type\AbstractType
	{
		return new Type\Common\Text(self::TEST_STATISTIC_NAME, self::TEST_TEXT_VALUE);
	}
}
