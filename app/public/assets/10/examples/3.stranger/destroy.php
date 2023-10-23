<?php

	// start session (starts a new one, or continues the already started one)
	session_start();

	// Best practice: unset all session vars before stopping the session
    $_SESSION = [];

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    /*
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    */
	
	// destroy the session
	session_destroy();

// EOF