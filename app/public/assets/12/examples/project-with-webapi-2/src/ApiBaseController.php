<?php

/**
 *
 * @author		Joris Maervoet
 * @copyright	Copyright (c), 2020 Joris Maervoet
 */
abstract class ApiBaseController
{
    protected ?array $httpBody;

    public function __construct()
    {
        // Parse the HTTP request body assuming it contains plain JSON
        // For example: {"title" : "Oneplus 7T", "price": 529.0, "quantity" : 200}
        // (If you want to parse application/x-www-form-urlencoded, use parse_str().)
        $this->httpBody = json_decode(file_get_contents('php://input'), true);

        // set the Content-type header of the HTTP response to JSON
        header('Content-type: application/json; charset=UTF-8');
    }

    protected function message(int $httpCode, string $message) {
        http_response_code($httpCode);
        $answer = ['message' => $message];
        echo json_encode($answer);
    }

    public function methodNotAllowed() {
        $this->message(405, 'HTTP request method ' .  $_SERVER['REQUEST_METHOD']. ' not allowed.');
    }


}
