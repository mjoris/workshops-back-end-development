<?php

class ProductController
{
    protected \Doctrine\DBAL\Connection $db;

    public function __construct()
    {
        // load .env
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();
        $dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);

        // initiate DB connection
        $this->db = DatabaseConnector::getConnection();
    }

    public function overview() {
        $products = $this->db->fetchAllAssociative('SELECT id, title, price, quantity FROM products', []);
        ApiResponse::success($products);
    }

    public function get($id) {
        $product = $this->db->fetchAssociative('SELECT id, title, price, quantity FROM products WHERE id = ?', [$id]);
        if ($product !== false)
            ApiResponse::success($product);
        else {
            ApiResponse::error('Product does not exist.', 404);
        }
    }

    public function post() {
        $bodyParams = ApiResponse::input();
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
                $result = $this->db->executeStatement('INSERT INTO products (title, price, quantity, description, added_on) VALUES (?, ?, ?, ?, ?)',
                    [$title, $price, $quantity, $description, (new DateTime())->format('Y-m-d H:i:s')]);

                if ($result > 0) {
                    ApiResponse::success('Product has been created.', status: 201); // 201 Created
                } else {
                    ApiResponse::error('Unable to create product.', 503); // 503 Service Unavailable
                }
            } else {
                ApiResponse::error('Validation error(s).', 422, implode(' ', $errorList)); // 422 Unprocessable Entity
            }
        } else {
            ApiResponse::error('Malformed request.', 400); // 400 Bad Request
        }

    }

    public function methodNotAllowed() {
        ApiResponse::error('HTTP request method ' .  $_SERVER['REQUEST_METHOD']. ' not allowed.', 405);
    }

}