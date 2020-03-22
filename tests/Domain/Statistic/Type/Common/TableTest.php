<?php

namespace Tests\Domain\Statistic\Type\Common;

use Sally\Dashboard\Domain\Statistic\Type;

/**
 * Class TableTest
 * @package Tests\Domain\Statistic\Type\Common
 * @property Type\Common\Table $type
 */
class TableTest extends AbstractTypeTest
{
	public function testGetName(): void
	{
		$this->assertSame(self::TEST_STATISTIC_NAME, $this->type->getName());
	}

	public function testGetHeaders(): void
	{
		$this->assertEmpty($this->type->getHeaders());

		$expectedHeaders = ['::some first header::', '::some second header::'];
		$this->type->setHeaders($expectedHeaders);

		$this->assertSame($expectedHeaders, $this->type->getHeaders());
	}

	public function testGetRows(): void
	{
		$this->assertEmpty($this->type->getRows());

		$expectedRows    = [
			['::some first row for first column::', '::some first row for second column::'],
			['::some second row for first column::', '::some second row for second column::'],
		];
		foreach ($expectedRows as $expectedRow) {
			$this->type->addRow($expectedRow);
		}

		$this->assertSame($expectedRows, $this->type->getRows());
	}

	protected function getType(): Type\AbstractType
	{
		return new Type\Common\Table(self::TEST_STATISTIC_NAME);
	}
}
