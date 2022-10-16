<?php

$result = $db->executeQuery('SELECT * FROM users WHERE id = ? or username = ?', array(1, 'pieter'));
$items = $result->fetchAllAssociative();

dump($items);