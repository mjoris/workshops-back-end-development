<?php

// Composer's autoloader & DB init
require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'functions.php';

// start session (starts a new one, or continues the already started one)
session_start();

// already logged in!
if (isset($_SESSION['user'])) {
    header('location: index.php');
    exit();
}

// var to tell if we have a login error
$formErrors = [];

// extract sent in username & password
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// form submitted
if (isset($_POST['moduleAction']) && ($_POST['moduleAction'] == 'login')) {

    // Get user with sent username from DB
    $connection = getConnection();
    $user = $connection->fetchAssociative('SELECT * FROM users WHERE username = ?', [$username]);

    // User found
    if ($user !== false) {

        // Password checks out
        if (password_verify($password, $user['password'])) {

            // Store the user row in the session
            $_SESSION['user'] = $user;

            /*
             * By now $_SESSION['user'] contains an array like
             * ['id' => 1, 'username' => 'joris', 'password' => '$2y$11$ERrAdBi/yPrdwAzgHOx1ROSZzt1U03wubDGBZu45oWpDRCnO0Frf2', 'email' => 'joris.maervoet@odisee.be']
             *
             * In fact it is more or less safe, because this variable stays on the server.
             * PRO: you have direct access to the user's data during the session
             * CON: things might get complicated when the user decides to change his name/password/... or when an administrators decides to deny access to this person.
             * Alternatively, you could only save the user id in the session:
             *
             * $_SESSION['user'] = $user['id'];
             *
             * */

            // Redirect to index
            header('location: index.php');
            exit();
        } // Invalid login
        else {
            $formErrors[] = 'Invalid login credentials';
        }
    } // username & password are not valid
    else {
        $formErrors[] = 'Invalid login credentials';
    }

}

?><!DOCTYPE html>
<html lang="en">
<head>
    <title>My login protected site</title>

    <meta charset="utf-8"/>

    <style>
        .note {
            background: #FFFF99;
        }

        .error {
            background: #FF9999;
        }
    </style>

    <script>
        window.addEventListener('load', function (e) {

            document.getElementsByTagName('input')[0].focus();

            document.forms[0].addEventListener('submit', function (e) {

                e.preventDefault();
                e.stopPropagation();

                var formValid = (document.getElementById('username').value != '') && (document.getElementById('password').value != '');

                if (!formValid) {
                    alert('Please enter your login credentials');
                    document.getElementsByTagName('input')[0].focus();
                } else {
                    document.forms[0].submit();
                }

            });

        });
    </script>

</head>
<body>

<h1>My login protected site</h1>

<?php

if (sizeof($formErrors) > 0) {
    echo '<p>Error while logging in:</p>';
    echo '<ul>' . PHP_EOL;
    foreach ($formErrors as $error) {
        echo '<li>' . $error . '</li>';
    }
    echo '</ul>' . PHP_EOL;
}

?>

<form action="login.php" method="post">
    <fieldset>
        <legend>Please log in</legend>
        <dl>
            <dt><label for="username">Username</label></dt>
            <dd><input type="text" name="username" id="username" value=""/></dd>
            <dt><label for="password">Password</label></dt>
            <dd><input type="password" name="password" id="password" value=""/></dd>
        </dl>
        <input type="hidden" name="moduleAction" id="moduleAction" value="login"/>
        <input type="submit" name="btnSubmit" value="Log in &gt;"/>
    </fieldset>
</form>

</body>
</html>