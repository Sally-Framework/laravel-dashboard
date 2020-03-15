<?php

namespace Tests\Domain\Statistic\Type;

use PHPUnit\Framework\TestCase;
use Sally\Dashboard\Domain\Statistic\Type\Factory;

class FactoryTest extends TestCase
{
    /**
     * @var Factory
     */
    private $factory;

    public function setUp()
    {
        $this->factory = new Factory();
    }

    public function testTextGeneration(): void
    {
        $textName  = '::some text name::';
        $textValue = '::some text value::';

        $text = $this->factory->text($textName, $textValue);

        $this->assertSame($textName, $text->getName());
        $this->assertSame($textValue, $text->getValue());
    }

    public function testTableGeneration(): void
    {
        $tableName    = '::some text name::';
        $tableHeaders = ['::some header::'];
        $tableRow     = ['::some row for first column::'];

        $table = $this->factory->table($tableName);

        $table->setHeaders($tableHeaders);
        $table->addRow($tableRow);

        $this->assertSame($tableName, $table->getName());
        $this->assertSame($tableHeaders, $table->getHeaders());
        $this->assertSame([$tableRow], $table->getRows());
    }

}
