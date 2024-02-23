<?php

require('ZitchaVersionNumbering.php');


if ($argc !== 3) {
    print 'You must provide exactly two command line arguments. The "higher" version followed by the "lower" version to compare';
    exit(1);
}

$higherVersionString = $argv[1];
$lowerVersionString = $argv[2];


$x = ZitchaVersionNumbering::isGreaterThanOrEqual($higherVersionString, $lowerVersionString);

if ($x !== true) {
    print '"' . $higherVersionString . '" is not greater than or equal to "' . $lowerVersionString . '"';
    exit(1);
}

print 'SUCCESS: ' . $higherVersionString . '" is greater than or equal to "' . $lowerVersionString . '"';
exit(0);
