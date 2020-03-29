<?php

namespace Sally\Dashboard\Helpers;

class ConfigHelper
{
    public const CONFIG_FILE_NAME = 'dashboard';

    private const KEY_STATISTIC_FILLER = 'statistic_filler';

    public static function getStatisticHandler(): string
    {
        return self::getConfigValueByKey(self::KEY_STATISTIC_FILLER);
    }

    private static function getConfigValueByKey(string $key): string
    {
        $configKey = sprintf('%s.%s', self::CONFIG_FILE_NAME, $key);
        return config($configKey);
    }
}
