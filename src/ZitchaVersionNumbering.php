<?php

class ZitchaVersionNumbering
{
    public static function isValid(string $versionString)
    {
        return (bool)preg_match('~^v[0-9]+\\.[0-9]+\\.[0-9]+$~', $versionString);
    }

    public static function isGreaterThanOrEqual(string $expectedHigherVersion, $expectedLowerVersion): bool
    {
        if (!self::isValid($expectedHigherVersion)) {
            print '"' . $expectedHigherVersion . '" is not a valid Zitcha Version (Higher Version)';
            exit(1);
        }

        if (!self::isValid($expectedLowerVersion)) {
            print '"' . $expectedLowerVersion . '" is not a valid Zitcha Version (Lower Version)';
            exit(1);
        }

        $expectedHigherVersion = substr($expectedHigherVersion, 1);
        $expectedLowerVersion = substr($expectedLowerVersion, 1);

        return version_compare($expectedHigherVersion, $expectedLowerVersion, '>=');
    }
}
