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
    }

    public function showPersonalMessages()
    {
        $messages = $this->db->fetchAllAssociative('SELECT * FROM messages WHERE user_id = ?', [$_SESSION['user']['id']]);
        echo $this->twig->render('messages.twig' , ['messages' => $messages, 'user' => $_SESSION['user']]);
    }

    public function showAllMessages()
    {
        $messages = $this->db->fetchAllAssociative('SELECT messages.id, messages.message, users.username AS author FROM messages LEFT JOIN users ON messages.user_id = users.id');
        echo $this->twig->render('home.twig' , ['messages' => $messages]);
    }

    public function showAdd()
    {
        $formErrors = isset($_SESSION['flash']['formErrors']) ? $_SESSION['flash']['formErrors']: [];
        $contents = isset($_SESSION['flash']['contents']) ? $_SESSION['flash']['contents']: '';
        unset($_SESSION['flash']);

        echo $this->twig->render('message-add.twig' , ['contents' => $contents, 'formErrors' => $formErrors, 'user' => $_SESSION['user']]);
    }

    public function add()
    {
        $contents = isset($_POST['message']) ? trim($_POST['message']) : '';

        if (isset($_POST['moduleAction']) && ($_POST['moduleAction'] == 'add')) {

            if (strlen($contents) < 3) {
                $formErrors[] = 'Contents must be 3 chars or more';
            }

            if (! $formErrors){
                $stmt = $this->db->prepare('INSERT INTO messages (message, user_id) VALUES (?, ?)');
                $stmt->executeStatement([$contents, $_SESSION['user']['id']]);
                header('Location: ../messages');
                exit();
            }
        }

        $_SESSION['flash'] = ['formErrors' => $formErrors, 'contents' => $contents];
        header('Location: add');
        exit();
    }

    public function showDelete($id)
    {
        // user_id PREVENTS UNAUTHORIZED ACCESS !!!
        $message = $this->db->fetchAssociative('SELECT * FROM messages WHERE id = ? AND user_id = ?', [$id, $_SESSION['user']['id']]);
        if (! $message) {
            header('Location: ../../messages');
            exit();
        }
        echo $this->twig->render('message-delete.twig' , ['message' => $message, 'user' => $_SESSION['user']]);
    }

    public function delete($id)
    {
        // user_id PREVENTS UNAUTHORIZED ACCESS !!!
        $stmt = $this->db->prepare('DELETE FROM messages WHERE id = ? AND user_id = ?' );
        $stmt->executeStatement([$id, $_SESSION['user']['id']]);
        header('Location: ../../messages');
        exit();
    }

}