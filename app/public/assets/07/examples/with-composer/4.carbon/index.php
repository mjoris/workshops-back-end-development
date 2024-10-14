<?php

// Require autoloader
require_once __DIR__ . '/vendor/autoload.php';

use Carbon\Carbon;

$dt = Carbon::now()->settings([
    'locale' => 'nl_BE',
    'timezone' => 'Europe/Brussels',
]);
echo $dt->isoFormat('dddd D MMMM YYYY');
echo '<br>';
$dt->endOfYear();
echo ('Oudjaar is ' . $dt->diffForHumans());