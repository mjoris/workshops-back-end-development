<?php

/**
 *
 * Class ApiResponse
 *
 * Utility methods for consistent JSON Web API responses
 * and for reading JSON request input.
 *
 * @author		Joris Maervoet
 * @copyright	Copyright (c), 2025 Joris Maervoet
 */
class ApiResponse
{
    /**
     * Reads and decodes JSON input from php://input.
     *
     * @return array|null The decoded JSON as an associative array.
     *                    Returns null if input is empty or invalid.
     */
    public static function input(): ?array
    {
        // json_decode: parse the HTTP request body assuming it contains plain JSON
        // For example: {"title" : "Oneplus 7T", "price": 529.0, "quantity" : 200}
        // (If you want to parse application/x-www-form-urlencoded, use parse_str().)
        return json_decode(file_get_contents('php://input'), true);
    }

    /**
     * Sends a successful JSON response and terminates script execution.
     *
     * @param mixed|null $data The main content of the response (typically an array or object).
     * @param array|null $meta Optional metadata (e.g. pagination or status info).
     * @param int $status HTTP status code (default: 200).
     *
     * @return void
     */
    public static function success(mixed $data = null, ?array $meta = null, int $status = 200): void
    {
        $response = [];

        if ($data !== null) {
            $response['data'] = $data;
        }

        if ($meta !== null) {
            $response['meta'] = $meta;
        }

        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($response, JSON_PRETTY_PRINT);
        exit;
    }

    /**
     * Sends an error JSON response and terminates script execution.
     *
     * @param string $message The error message to display.
     * @param int $status HTTP status code (default: 400).
     * @param array|string $errors Optional additional error details.
     *
     * @return void
     */
    public static function error(string $message, int $status = 400, array|string $errors = []): void
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode([
            'error' => [
                'message' => $message,
                'details' => $errors,
                'status'  => $status,
            ]
        ], JSON_PRETTY_PRINT);
        exit;
    }
}