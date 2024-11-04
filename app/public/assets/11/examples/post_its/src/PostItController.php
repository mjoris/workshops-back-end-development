<?php


class PostItController
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
            return $_ENV['BASE_PATH'] . $path;
        });
        $this->twig->addFunction($function);
    }

    public function showPersonalMessages(): void
    {
        $messages = $this->db->fetchAllAssociative('SELECT * FROM messages WHERE user_id = ?', [$_SESSION['user']['id']]);
        echo $this->twig->render('messages.twig', ['messages' => $messages, 'user' => $_SESSION['user']]);
    }

    public function showAllMessages(): void
    {
        $messages = $this->db->fetchAllAssociative('SELECT messages.id, messages.message, users.username AS author FROM messages LEFT JOIN users ON messages.user_id = users.id');
        echo $this->twig->render('home.twig', ['messages' => $messages]);
    }

    public function showAdd(): void
    {
        $formErrors = $_SESSION['flash']['formErrors'] ?? [];
        $contents = $_SESSION['flash']['contents'] ?? '';
        unset($_SESSION['flash']);

        echo $this->twig->render('message-add.twig', ['contents' => $contents, 'formErrors' => $formErrors, 'user' => $_SESSION['user']]);
    }

    public function add(): void
    {
        $contents = isset($_POST['message']) ? trim($_POST['message']) : '';
        $formErrors = [];

        if (isset($_POST['moduleAction']) && ($_POST['moduleAction'] == 'add')) {

            if (strlen($contents) < 3) {
                $formErrors[] = 'Contents must be 3 chars or more';
            }

            if (!$formErrors) {
                $this->db->executeStatement('INSERT INTO messages (message, user_id) VALUES (?, ?)', [$contents, $_SESSION['user']['id']]);
                header('Location: ../messages');
                exit();
            }
        }

        $_SESSION['flash'] = ['formErrors' => $formErrors, 'contents' => $contents];
        header('Location: add');
        exit();
    }

    public function showDelete(int $id): void // actually $id is a well-formed numeric string
    {
        // user_id PREVENTS UNAUTHORIZED ACCESS !!!
        $message = $this->db->fetchAssociative('SELECT * FROM messages WHERE id = ? AND user_id = ?', [$id, $_SESSION['user']['id']]);
        if (!$message) {
            header('Location: ../../messages');
            exit();
        }
        echo $this->twig->render('message-delete.twig', ['message' => $message, 'user' => $_SESSION['user']]);
    }

    public function delete(int $id): void
    {
        // user_id PREVENTS UNAUTHORIZED ACCESS !!!
        $this->db->executeStatement('DELETE FROM messages WHERE id = ? AND user_id = ?', [$id, $_SESSION['user']['id']]);
        header('Location: ../../messages');
        exit();
    }

}