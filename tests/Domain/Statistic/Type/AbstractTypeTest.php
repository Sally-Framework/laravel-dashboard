<?php

namespace Tests\Domain\Statistic\Type;

use PHPUnit\Framework\TestCase;

abstract class AbstractTypeTest extends TestCase
{
	abstract public function testGetName(): void;
}
