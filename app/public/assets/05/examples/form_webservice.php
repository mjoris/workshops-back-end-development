<?php

$name = isset($_POST['name']) ? (string)$_POST['name'] : false;

if ($name !== false) {
    // validation

    $errorList = [];

    if (trim($name) == '') {
        $errorList[] = 'Please enter your name';
    }

    if (!$errorList) {
        // do (database) action
        // ...
        echo 'Name has been registered';
        exit; // HTTP response is sent with status code 200
    } else {
        http_response_code(422); // 422 Unprocessable Entity
        echo implode(';', $errorList);
        exit; // HTTP response is sent with status code 422
    }
} else {
    http_response_code(400); // 400 Bad Request
    echo 'Malformed request';
    exit; // HTTP response is sent with status code 400
}