<?php

error_reporting(E_ALL); // set error reporting on

$host = 'http://www.myhost.com/';

$absUrl = function (string $relUrl) use ($host): string {
    return $host . $relUrl;
};

echo $absUrl('files/uploads/me.jpg');