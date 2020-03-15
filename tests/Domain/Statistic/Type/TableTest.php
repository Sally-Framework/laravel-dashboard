<?php

namespace Tests\Domain\Statistic\Type;

use Sally\Dashboard\Domain\Statistic\Type\AbstractType;
use Sally\Dashboard\Domain\Statistic\Type\Table;

class TableTest extends AbstractTypeTest
{
    private $testTableName = '::some name';

    public function testCreation(): void
    {
        $table = $this->getModel();
        $this->assertSame($this->testTableName, $table->getName());

        $this->assertEmpty($table->getHeaders());
        $this->assertEmpty($table->getRows());

        $expectedHeaders = ['::some first header::', '::some second header::'];
        $expectedRows    = [
            ['::some first row for first column::', '::some first row for second column::'],
            ['::some second row for first column::', '::some second row for second column::'],
        ];

        foreach ($expectedRows as $expectedRow) {
            $table->addRow($expectedRow);
        }

        $table->setHeaders($expectedHeaders);

        $this->assertSame($expectedHeaders, $table->getHeaders());
        $this->assertSame($expectedRows, $table->getRows());
    }

    /**
     * @return Table
     */
    protected function getModel(): AbstractType
    {
        return new Table($this->testTableName);
    }
}
