<?php

namespace Workbench;

final class TestHelper
{
    /** @var class-string[] */
    private static array $providers = [];

    /**
     * @return class-string[]
     */
    public static function providers(): array
    {
        return self::$providers;
    }

    /**
     * @param  class-string  ...$provider
     */
    public static function useProviders(string ...$providers)
    {
        self::$providers = $providers;
    }

    public static function clearProviders(): void
    {
        self::$providers = [];
    }
}
