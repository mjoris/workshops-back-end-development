<?php

// Require autoloader
require_once __DIR__ . '/vendor/autoload.php';

use Carbon\Carbon;

// set global locale to Dutch
Carbon::setLocale('nl');

$dt = Carbon::now();
echo $dt->isoFormat('dddd D MMMM YYYY');
echo '<br>';
$dt->endOfYear();
echo ('Oudjaar is ' . $dt->diffForHumans());