<?php

// Require autoloader
require_once __DIR__ . '/vendor/autoload.php';

use Carbon\Carbon;

// set global locale to Dutch (-> displaying dates/times)
setlocale(LC_TIME, 'nl_NL');
$dt = Carbon::now();
echo $dt->formatLocalized('%A %d %B %Y');
echo '<br>';

// set Carbon locale to Dutch (-> displaying time differences)
Carbon::setLocale('nl');
$dt->endOfYear();
echo ('Oudjaar is ' . $dt->diffForHumans());