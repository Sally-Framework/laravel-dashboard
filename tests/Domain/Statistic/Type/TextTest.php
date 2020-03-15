<?php

namespace Tests\Domain\Statistic\Type;

use Sally\Dashboard\Domain\Statistic\Type\AbstractType;
use Sally\Dashboard\Domain\Statistic\Type\Text;

class TextTest extends AbstractTypeTest
{
    /**
     * @var string
     */
    private $testTextName = '::some name::';

    /**
     * @var string
     */
    private $testTextValue = '::some value::';

    public function testCreation(): void
    {
        $text = $this->getModel();
        $this->assertSame($this->testTextName, $text->getName());
        $this->assertSame($this->testTextValue, $text->getValue());
    }

    /**
     * @return AbstractType|Text
     */
    protected function getModel(): AbstractType
    {
        return  new Text($this->testTextName, $this->testTextValue);
    }
}
