<?php

namespace Tests\Domain\Statistic\Type;

use Sally\Dashboard\Domain\Statistic\Type;

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
		return new Type\Text(self::TEST_STATISTIC_NAME, self::TEST_TEXT_VALUE);
	}
}
