<?php

$result = $db->insert('users', array(
	'username' => 'testuser',
	'password' => '548b443423c74becf92a5091bd63a80f058f38fc',
    'email' => 'test@odisee.be',
    'equipment' => 'a lot'
));

dump($db->lastInsertId());