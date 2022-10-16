<?php

$result = $db->executeQuery('SELECT username FROM users WHERE id = "' . $db->quote('1; DROP TABLE users; --') . '"');
$value = $result->fetchOne();

dump($value);