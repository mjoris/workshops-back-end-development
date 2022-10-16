<?php

$numAffected = $db->executeStatement('UPDATE photos SET title = REVERSE(title) WHERE id = ?', array(1));

dump($numAffected);