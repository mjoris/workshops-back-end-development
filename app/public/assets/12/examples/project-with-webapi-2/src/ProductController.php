<?php

class ProductController extends ApiBaseController
{
    protected \Doctrine\DBAL\Connection $db;

    public function __construct()
    {
        parent::__construct();

        // initiate DB connection
        $this->db = DatabaseConnector::getConnection();
    }

    public function overview() {
        $products = $this->db->fetchAllAssociative('SELECT id, title, price, quantity FROM products', []);
        echo json_encode(['products' => $products]);
    }

    public function get($id) {
        $product = $this->db->fetchAssociative('SELECT id, title, price, quantity FROM products WHERE id = ?', [$id]);
        if ($product !== false)
            echo json_encode($product);
        else {
            $this->message(404, 'Product does not exist.');
        }
    }

    public function post() {
        $bodyParams = $this->httpBody;
        $title = $bodyParams['title'] ?? false;
        $price = $bodyParams['price'] ?? false;
        $quantity = $bodyParams['quantity'] ?? false;
        if (($title !== false) && ($price !== false) && ($quantity !== false)) {

            $description = $bodyParams['description'] ?? ''; // optional

            // validation
            $errorList = [];
            if (strlen($title) === 0) {
                $errorList[] = 'Title must not be empty.';
            }
            if (! is_numeric($price)) {
                $errorList[] = 'Price must be numeric.';
            }
            if (filter_var($quantity, FILTER_VALIDATE_INT) === false) {
                $errorList[] = 'Quantity must be integer.';
            }

            if (!$errorList) {
                $stmt = $this->db->prepare('INSERT INTO products (title, price, quantity, description, added_on) VALUES (?, ?, ?, ?, ?)');
                $stmt->execute([$title, $price, $quantity, $description, (new DateTime())->format('Y-m-d H:i:s')]);

                if ($stmt->rowCount() > 0) {
                    $this->message(201, 'Product has been created.'); // 201 Created
                } else {
                    $this->message(503, 'Unable to create product.'); // 503 Service Unavailable
                }
            } else {
                $this->message(422, implode(' ', $errorList)); // 422 Unprocessable Entity
            }
        } else {
            $this->message(400, 'Unable to create product. Malformed request.'); // 400 Bad Request
        }

    }

}