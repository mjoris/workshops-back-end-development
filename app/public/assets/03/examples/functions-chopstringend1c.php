<?php

// Our chopStringEnd function
function chopStringEnd(string $str, int $len, string|null $ending): string|bool
{
    if (strlen($str) < $len)
        return false;
    else
        return substr($str, 0, $len - strlen($str)) . $ending;
}

// Our variables
$origStr = 'Welkom in deze tweede workshop van Back-end Development!';
$cutoffLength = 1000;
$endStr = '...';

// named arguments in function call
var_dump(chopStringEnd(str: $origStr, len: $cutoffLength, ending: $endStr));