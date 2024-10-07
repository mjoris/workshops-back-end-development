<?php

/**
 * Open a file and show its contents
 * @author Bramus Van Damme <bramus.vandamme@odisee.be>
 */

// path to file (relative from this PHP file)
$filename = __DIR__ . '/testfile.txt';

// open the file in read mode
// @see http://php.net/fopen for other modes (r, r+, w, w+, a, a+, ...)
$file = new SplFileObject($filename, 'r');

// read as much bytes as the file size
$contents = $file->fread($file->getSize());

// close the file handle
$file = null;

// output the fetched contents
echo $contents;

// EOF