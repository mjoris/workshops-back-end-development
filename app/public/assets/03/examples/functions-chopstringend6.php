<?php

    // Our chopStringEnd function
    function chopStringEnd(string &$str, int $len, string $ending) : void {
        if (strlen($str) > $len)
            $str = substr($str, 0, $len - strlen($str)) . $ending;
    }

    // Our variables
    $origStr = '/Users/bramus/Dropbox/Kaho/Lesactiviteiten/Webscripting1';
    $cutoffLength = 40;
    $endStr = '...';

    // Go!
    chopStringEnd($origStr, $cutoffLength, $endStr);
    echo $origStr;