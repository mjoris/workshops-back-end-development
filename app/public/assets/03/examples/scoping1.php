<?php

error_reporting(E_ALL); // set error reporting on
ini_set('display_errors', 'on'); // show the errors on screen

$host = 'http://www.myhost.com/';

function absUrl($relUrl)
{
    return $host . $relUrl;
}

echo absUrl('files/uploads/me.jpg');