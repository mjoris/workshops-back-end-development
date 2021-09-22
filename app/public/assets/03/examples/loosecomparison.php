<?php
    $items = [true, false, 1, 0 , -1, '1', '0', '-1', null, [], 'php', ''];
    foreach ($items as $column) {
        foreach ($items as $row) {
            echo $column == $row ? 'T ' : 'f ';
        }
        echo PHP_EOL;
    }