<?php

namespace Tests\Domain\Statistic\Type;

use Sally\Dashboard\Domain\Statistic\Type;

class TableTest extends AbstractTypeTest
{
    private const TEST_TABLE_NAME = '::some name';

	/**
	 * @var Type\Table
	 */
    private $table;

    public function setUp(): void
    {
		$this->table = new Type\Table(self::TEST_TABLE_NAME);
    }

	public function testGetName(): void
	{
		$this->assertSame(self::TEST_TABLE_NAME, $this->table->getName());
	}

	public function testGetHeaders(): void
	{
		$this->assertEmpty($this->table->getHeaders());

		$expectedHeaders = ['::some first header::', '::some second header::'];
		$this->table->setHeaders($expectedHeaders);

		$this->assertSame($expectedHeaders, $this->table->getHeaders());
	}

	public function testGetRows(): void
	{
		$this->assertEmpty($this->table->getRows());

		$expectedRows    = [
			['::some first row for first column::', '::some first row for second column::'],
			['::some second row for first column::', '::some second row for second column::'],
		];
		foreach ($expectedRows as $expectedRow) {
			$this->table->addRow($expectedRow);
		}

		$this->assertSame($expectedRows, $this->table->getRows());
	}
}
