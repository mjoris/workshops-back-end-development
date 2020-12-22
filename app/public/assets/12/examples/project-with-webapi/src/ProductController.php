<?php

class ProductController extends ApiBaseController
{
    protected \Doctrine\DBAL\Connection $db;

    public function __construct()
    {
        // initiate DB connection
        $this->db = DatabaseConnector::getConnection();
    }

    protected function overview($urlParams, $bodyParams) {
        $products = $this->db->fetchAllAssociative('SELECT id, title, price, quantity FROM products', []);
        return ['products' => $products];
    }

    protected function get($urlParams, $bodyParams, $id) {
        $product = $this->db->fetchAssociative('SELECT id, title, price, quantity FROM products WHERE id = ?', [$id]);
        if ($product !== false)
            return $product;
        else {
            http_response_code(404); // 404 Not Found.
            return ['message' => 'Product does not exist.'];
        }
    }

    protected function post($urlParams, $bodyParams) {
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
                    http_response_code(201); // 201 Created
                    return ['message' => 'Product has been created.'];
                } else {
                    http_response_code(503); // 503 Service Unavailable
                    return ['message' => 'Unable to create product.'];
                }
            } else {
                http_response_code(422); // 422 Unprocessable Entity
                return ['messages' => $errorList];
            }

        }

        http_response_code(400); // 400 Bad Request
        return ['message' => 'Unable to create product. Malformed request.'];

    }

}