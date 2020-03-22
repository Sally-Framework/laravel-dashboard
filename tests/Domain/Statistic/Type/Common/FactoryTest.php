<?php

namespace Tests\Domain\Statistic\Type\Common;

use PHPUnit\Framework\TestCase;
use Sally\Dashboard\Domain\Statistic\Interfaces\Type\Common\FactoryInterface;
use Sally\Dashboard\Domain\Statistic\Type;

class FactoryTest extends TestCase
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    public function setUp(): void
    {
        $this->factory = new Type\Common\Factory();
    }

    public function testTextGeneration(): void
    {
        $textName  = '::some text name::';
        $textValue = '::some text value::';

        $text = $this->factory->text($textName, $textValue);

        $this->assertEquals(new Type\Common\Text($textName, $textValue), $text);
    }

    public function testTableGeneration(): void
    {
        $tableName = '::some text name::';
        $table = $this->factory->table($tableName);

	    $this->assertEquals(new Type\Common\Table($tableName), $table);
    }

}
