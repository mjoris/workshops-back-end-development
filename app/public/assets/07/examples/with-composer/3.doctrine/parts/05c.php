<?php

$items = $db->fetchAllAssociative('SELECT * FROM users WHERE id = ? or username = ?', array(1, 'rogier'));

dump($items);