<?php

namespace Tests\Domain\Statistic\Type;

use Sally\Dashboard\Domain\Statistic\Type\Text;

class TextTest extends AbstractTypeTest
{
    private const TEST_TEXT_NAME  = '::some name::';
    private const TEST_TEXT_VALUE = '::some value::';

	/**
	 * @var Text
	 */
    private $text;

    protected function setUp(): void
    {
		$this->text = new Text(self::TEST_TEXT_NAME, self::TEST_TEXT_VALUE);
    }

	public function testGetName(): void
	{
		$this->assertSame(self::TEST_TEXT_NAME, $this->text->getName());
	}

	public function testGetValue(): void
	{
		$this->assertSame(self::TEST_TEXT_VALUE, $this->text->getValue());
	}
}
