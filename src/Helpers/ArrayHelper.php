<?php
/**
 * Created by n0tm
 * Date: 23.03.2020
 */

namespace Sally\Dashboard\Helpers;

class ArrayHelper
{
	public static function isContainsTypeOf(array $haystack, string $type): bool
	{
		return collect($haystack)
			->contains(function ($value) use ($type): bool {
				return $value instanceof $type;
			});
	}
}