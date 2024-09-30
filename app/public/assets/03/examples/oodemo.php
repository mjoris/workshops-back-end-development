<?php
$zone = new DateTimeZone('Europe/Brussels'); // object construction
$myDateOfBirth = new DateTime('1979-04-29 11:30', $zone);
echo($myDateOfBirth->getTimestamp() . '<br>' . PHP_EOL); // method call

$w3cFormat = DateTime::W3C; // class constant
echo($myDateOfBirth->format($w3cFormat) . '<br>' . PHP_EOL);

$date = DateTime::createFromFormat('j-M-Y', '01-Oct-2024'); // static method call
$duration = $date->diff($myDateOfBirth);
echo($duration->days); // accessing a property


