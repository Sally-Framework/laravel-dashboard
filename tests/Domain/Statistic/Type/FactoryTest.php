<?php

namespace Tests\Domain\Statistic\Type;

use PHPUnit\Framework\TestCase;
use Sally\Dashboard\Domain\Statistic\Interfaces\Type\FactoryInterface;
use Sally\Dashboard\Domain\Statistic\Type;

class FactoryTest extends TestCase
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    public function setUp(): void
    {
        $this->factory = new Type\Factory();
    }

    public function testTextGeneration(): void
    {
        $textName  = '::some text name::';
        $textValue = '::some text value::';

        $text = $this->factory->text($textName, $textValue);

        $this->assertEquals(new Type\Text($textName, $textValue), $text);
    }

    public function testTableGeneration(): void
    {
        $tableName = '::some text name::';
        $table = $this->factory->table($tableName);

	    $this->assertEquals(new Type\Table($tableName), $table);
    }

}
