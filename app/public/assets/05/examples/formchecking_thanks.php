<?php

	$name = isset($_GET['name']) ? $_GET['name'] : false;
	$age = isset($_GET['age']) ? $_GET['age'] : false;

?><!DOCTYPE html>
<html>
<head>
	<title>Testform</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>

<?php

	// Name sent in
	if ($name) {
		echo '<p>Thank you ' . htmlentities($name). '</p>';
	}

	// Age sent in
	else if ($age) {
		echo '<p>Thank you, ' . htmlentities($age). ' year old stranger</p>';
	}

	// Nothing sent in
	else {
		echo '<p>Thank you, stranger</p>';
	}

?>

	<div id="debug">

<?php

	/**
	 * Helper Functions
	 * ========================
	 */

		/**
		 * Dumps a variable
		 * @param mixed $var
		 * @return void
		 */
		function dump($var) {
			echo '<pre>';
			var_dump($var);
			echo '</pre>';
		}


	/**
	 * Main Program Code
	 * ========================
	 */

		// dump $_GET
		dump($_GET);

?>

	</div>

</body>
</html>