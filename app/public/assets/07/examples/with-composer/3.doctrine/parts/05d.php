<?php

$value = $db->fetchOne('SELECT username FROM users WHERE id = ?', array(2));

dump($value);