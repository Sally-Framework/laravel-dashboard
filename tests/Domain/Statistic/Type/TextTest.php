<?php

namespace Tests\Domain\Statistic\Type;

use Codeception\PHPUnit\TestCase;
use Sally\Dashboard\Domain\Statistic\Type\Text;

class TextTest extends TestCase
{
    public function testCreation()
    {
        $someName  = '::some name::';
        $someValue = '::some value::';
        $text = new Text($someName, $someValue);

        $this->assertSame($someName, $text->getName());
        $this->assertSame($someValue, $text->getValue());
    }
}
