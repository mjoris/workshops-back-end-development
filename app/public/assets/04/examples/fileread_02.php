<?php

/**
 * Get contents of a file into a string (per 20 bytes)
 * @author Bramus Van Damme <bramus.vandamme@odisee.be> joris maervoet
 */

$filename = __DIR__ . '/testfile.txt';

$file = new SplFileObject($filename, 'r');

while (!$file->eof()) {
    $buffer = $file->fread(20);
    echo $buffer . '<br />' . PHP_EOL;
}

$file = null;

// EOF