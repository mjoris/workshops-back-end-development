<?php

error_reporting(E_ALL); // set error reporting on

function absUrl(string $relUrl, string $host = 'http://www.myhost.com/'): string
{
    return $host . $relUrl;
}

echo absUrl('files/uploads/me.jpg');