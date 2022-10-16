<?php

$item = $db->fetchNumeric('SELECT * FROM users WHERE id = ?', array(1));

dump($item);