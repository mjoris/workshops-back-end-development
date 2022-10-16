<?php

$item = $db->fetchAssociative('SELECT * FROM users WHERE id = ?', array(1));

dump($item);