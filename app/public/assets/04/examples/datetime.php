<?php
    $zone = new DateTimeZone('Europe/Brussels');
    $myDateOfBirth = new DateTime('1979-04-29 11:30', $zone);
    echo ($myDateOfBirth->getTimestamp() . '<br><br>' . PHP_EOL);
    echo 'm.d.y H:i:s' . '<br>' . PHP_EOL;
    echo ($myDateOfBirth->format('m.d.y H:i:s') . '<br><br>' . PHP_EOL);

    $w3cFormat = DateTime::W3C;
    echo ($w3cFormat . '<br>' . PHP_EOL);
    echo ($myDateOfBirth->format($w3cFormat) . '<br><br>' . PHP_EOL);

    $date = DateTime::createFromFormat('j-M-Y', '28-Sep-2020');
    $duration = $date->diff($myDateOfBirth);
    echo ($duration->days);


