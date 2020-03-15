<?php

namespace Tests\Domain\Statistic;

use PHPUnit\Framework\TestCase;
use Sally\Dashboard\Domain\Statistic\Composite;
use Sally\Dashboard\Domain\Statistic\Type\Text;

class CompositeTest extends TestCase
{
    /**
     * @var Composite
     */
    private $composite;

    public function setUp()
    {
        $this->composite = new Composite();
    }

    public function testGettingItemsAfterAdd()
    {
        $this->assertEmpty($this->composite->getItems());
        $type = new Text('::some name::', '::some value::');
        $this->composite->add($type);
        $this->assertSame([$type], $this->composite->getItems());
    }
}
