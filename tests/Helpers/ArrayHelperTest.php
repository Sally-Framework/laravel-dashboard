<?php
/**
 * Created by n0tm
 * Date: 23.03.2020
 */

namespace Tests\Helpers;

use PHPUnit\Framework\TestCase;

class TestClass
{
}

class ArrayHelperTest extends TestCase
{
	/**
	 * @dataProvider providerContainsTypeOf
	 * @param array $haystack
	 * @param string $type
	 * @param bool $isContainsNeedle
	 */
	public function testIsContainsTypeOf(array $haystack, string $type, bool $isContainsNeedle): void
	{
		$isReallyContains = false;
		foreach ($haystack as $item) {
			if ($item instanceof $type) {
				$isReallyContains = true;
			}
		}

		$this->assertEquals($isReallyContains, $isContainsNeedle);
	}

	public function providerContainsTypeOf(): array
	{
		return [
			[
				[
					new \stdClass(),
				],
				\stdClass::class,
				true
			],
			[
				[
					new \stdClass(),
					new \stdClass(),
					new \stdClass(),
				],
				\stdClass::class,
				true
			],
			[
				[],
				\stdClass::class,
				false
			],
			[
				[
					new TestClass()
				],
				\stdClass::class,
				false
			],
			[
				[
					new TestClass(),
					new TestClass(),
					new TestClass(),
				],
				\stdClass::class,
				false
			]
		];
	}
}