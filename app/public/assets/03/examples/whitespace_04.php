<?php

// disable XDEBUGs var_dump implementation
ini_set('xdebug.overload_var_dump', 0);

/**
 * Dumps a variable
 * @param mixed $var
 * @return
 */
function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

dump($_SERVER);