<?php
    $selection = [];
    while (count($selection) < 50000) {
        $random = mt_rand(0, 500000);
        $selection[$random] = 1;
    }
    echo ('Computed 50000 unique random numbers.' . PHP_EOL);

    $success = 0;
    for ($i = 0; $i < 50000; $i++) {
        $guess = mt_rand(0, 500000);
        if (array_key_exists($guess, $selection)) {
            $success++;
        }
    }
    echo ('Correct guesses: ' . $success . PHP_EOL);