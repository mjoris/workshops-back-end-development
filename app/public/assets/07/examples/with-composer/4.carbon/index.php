<?php

// Require autoloader
require_once __DIR__ . '/vendor/autoload.php';

use Carbon\Carbon;

$dt = Carbon::now('Europe/Brussels')->locale('nl_BE');

echo $dt->isoFormat('dddd D MMMM YYYY');
echo '<br>';
$dt->endOfYear();
echo ('Oudjaar is ' . $dt->diffForHumans());