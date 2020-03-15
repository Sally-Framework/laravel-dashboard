<?php

namespace Tests\Domain\Statistic\Type;

use PHPUnit\Framework\TestCase;
use Sally\Dashboard\Domain\Statistic\Type\AbstractType;

abstract class AbstractTypeTest extends TestCase
{
    abstract public function testCreation(): void;
    abstract protected function getModel(): AbstractType;
}
