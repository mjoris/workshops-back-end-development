<?php

$result = $db->executeQuery('SELECT * FROM users WHERE id = ?', array(1));
$item = $result->fetchAssociative();

dump($item);