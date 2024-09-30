<?php

// Out chopStringEnd function
function chopStringEnd(string $str, int $len = 30, string $ending = '---'): string
{
    if (strlen($str) < $len)
        return $str;
    else
        return substr($str, 0, $len - strlen($str)) . $ending;
}

// Our variables
$origStr = 'Welkom in deze tweede workshop van Back-end Development!';
$cutoffLength = 40;
$endStr = '...';

// Go!
echo chopStringEnd($origStr, $cutoffLength, $endStr) . '<br />' . PHP_EOL;
echo chopStringEnd($origStr, $cutoffLength) . '<br />' . PHP_EOL;
echo chopStringEnd($origStr);