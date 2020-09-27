<?php
	ob_end_flush(); // simulate disabled output buffering
	echo 'Will it blend?';

	header('Location: http://www.ikdoeict.be/');
	exit();

//EOF