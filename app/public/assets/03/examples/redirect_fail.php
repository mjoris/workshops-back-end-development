<?php
	ob_end_flush(); // simulate disabled output buffering
	echo 'Will it blend?';

	header('Location: https://www.odisee.be');
	exit();

//EOF