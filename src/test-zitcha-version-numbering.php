<?php

/**
 * Unit Tests
 *
 * usage:
 *
 * php test-zitcha-version-numbering.php
 */

require('ZitchaVersionNumbering.php');

Test_isGreaterThanOrEqual();
function Test_isGreaterThanOrEqual()
{
    // "true" expected
    foreach (
        [
            'v1.2.3' => 'v1.2.3',
            'v1.2.3' => 'v1.2.2',
            'v2.0.0' => 'v1.9.9',
            'v0.0.1' => 'v0.0.0',
        ] as $expectedHigherVersion => $expectedLowerVersion
    ) {
        if (! ZitchaVersionNumbering::isGreaterThanOrEqual($expectedHigherVersion, $expectedLowerVersion)) {
            throw new \Exception('Test_isGreaterThanOrEqual failed');
        }
    }

    // "false" expected
    foreach (
        [
            'v1.2.3' => 'v1.2.4',
            'v1.2.3' => 'v2.2.0',
            'v0.0.1' => 'v0.1.0',
        ] as $expectedHigherVersion => $expectedLowerVersion
    ) {
        if (ZitchaVersionNumbering::isGreaterThanOrEqual($expectedHigherVersion, $expectedLowerVersion)) {
            throw new \Exception('Test_isGreaterThanOrEqual failed');
        }
    }

    print 'Test_isGreaterThanOrEqual passed' . PHP_EOL;
}


Test_isValid();
function Test_isValid()
{
    // Unit tests

    $testValues = [
        // Valid
        'v1.2.3' => true,
        'v10.22.30' => true,
        'v0.0.1' => true,

        // Invalid
        '' => false,
        '1.2.3' => false,
        '1.2.3x' => false,
        '1.2.3.' => false,
        'v1.2' => false,
        'v1..2' => false,
        'v1.x.x' => false,
    ];

    foreach ($testValues as $input => $expected) {
        if (ZitchaVersionNumbering::isValid($input) !==  $expected) {
            throw new \Exception('Test_isValid failed');
        }
    }

    print 'Test_isValid passed' . PHP_EOL;
}
