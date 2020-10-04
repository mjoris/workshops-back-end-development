<?php

	try {
		$di = new DirectoryIterator('/this/path/does/not/exist');
	} catch (RuntimeException $e) {
		echo 'There was an error: <br />' . $e->getMessage();
	}

// EOF