<?php

$result = $db->update('users',
	array(
		'password' => 'df8b443423c74becf92a5091bd63a80f058f38dc',
		'username' => 'tester'
	),
	array('id' => $db->fetchOne('SELECT MAX(id) FROM users'))
);

dump($result);