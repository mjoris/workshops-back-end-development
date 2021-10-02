<?php

	try {
		$di = new DirectoryIterator('/this/path/does/not/exist');
	} catch (UnexpectedValueException $e) {
		echo 'There was an error: <br />' . $e->getMessage();
	}

// EOF