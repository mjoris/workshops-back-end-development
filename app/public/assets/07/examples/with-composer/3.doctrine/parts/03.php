<?php

$result = $db->executeQuery('SELECT username FROM users WHERE id = ?', array(1));
$value = $result->fetchOne();

dump($value);