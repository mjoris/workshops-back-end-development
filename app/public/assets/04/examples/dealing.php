<?php

// copy the file
$result = @copy(__DIR__ . '/i.do.not.exist.txt', __DIR__ . '/copiedfile.txt');

if ($result !== false) {
    // proceed ...

} else {
    echo('Oops... copy has failed.');

}


// EOF