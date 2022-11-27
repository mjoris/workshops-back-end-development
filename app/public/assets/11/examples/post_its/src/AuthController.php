<?php

class AuthController
{
    protected \Doctrine\DBAL\Connection $db;
    protected \Twig\Environment $twig;

    public function __construct()
    {
        // initiate DB connection
        $this->db = DatabaseConnector::getConnection();

        // bootstrap Twig
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
        $this->twig = new \Twig\Environment($loader);
        $function = new \Twig\TwigFunction('url', function ($path) {
            return BASE_PATH . $path;
        });
        $this->twig->addFunction($function);
    }

    public function showLogin()
    {
        echo $this->twig->render('login.twig' , ['username' => '']);
    }

    public function login()
    {
        $formErrors = [];

        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        if (isset($_POST['moduleAction']) && ($_POST['moduleAction'] == 'login')) {
            $stmt = $this->db->prepare('SELECT * FROM users WHERE username = ?');
            $result = $stmt->executeQuery([$username]);
            $user = $result->fetchAssociative();

            if (($user !== false) && (password_verify($password, $user['password']))) {
                $_SESSION['user'] = $user;
                header('location: messages');
                exit();
            }
            else {
                $formErrors[] = 'Invalid login credentials';
            }
        }

        header('Location: login');
        exit();
    }

    public function logout()
    {

        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header('Location: login');
        exit();
    }

}