<?php

// Our chopStringEnd function
function chopStringEnd(string $str, int $len): string
{
    if (strlen($str) < $len)
        return $str;
    else
        return substr($str, 0, $len - strlen($str)) . '---';
}

// Our variables
$origStr = 'Welkom in deze tweede workshop van Back-end Development!';
$cutoffLength = 40;
$endStr = '...';

// Go!
echo chopStringEnd($origStr, $cutoffLength, $endStr);