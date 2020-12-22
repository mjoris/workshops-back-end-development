<?php

/**
 * Extend ApiBaseController in order to create a resource controller.
 * A resource controller handles the endpoints of a Web API for one specific resource.
 * In the child class, implement a method for any of the HTTP request methods
 * your controller should support:
 *   function overview($urlParams, $bodyParams)     GET all resources
 *   function post($urlParams, $bodyParams)         POST resource
 *   function get($urlParams, $bodyParams, $id)     GET resource (id in URL)
 *   function pull($urlParams, $bodyParams, $id)    PULL resource (id in URL)
 *   function patch($urlParams, $bodyParams, $id)   PATCH resource (id in URL)
 *   function delete($urlParams, $bodyParams, $id)  DELETE resource (id in URL)
 *
 * In order to activate the resource controller,
 *   (1) make an instance of the child class
 *   (2) call the method dispatch() on the instance
 *
 * @author		Joris Maervoet
 * @copyright	Copyright (c), 2020 Joris Maervoet
 */
abstract class ApiBaseController
{
    public function dispatch($id = false) : void {

        // Identify the HTTP request method (GET, POST, PULL, ...)
        $httpMethod = strtolower($_SERVER['REQUEST_METHOD']);

        // Name of required function in child controller
        $method = (($id == false && $httpMethod == 'get')? 'overview' : $httpMethod);

        // Parse the HTTP request body assuming it contains plain JSON
        // For example: {"title" : "Oneplus 7T", "price": 529.0, "quantity" : 200}
        // (If you want to parse application/x-www-form-urlencoded, use parse_str().)
        $httpBody = json_decode(file_get_contents('php://input'), true);

        // Does an instance of this class contain a method called get(), post(), pull() ...?
        if (method_exists($this, $method)) {

            // if so, call this method
            $answer = call_user_func(array($this, $method), $_GET, $httpBody, $id);
        } else {

            // HTTP response code 405 Method Not Allowed (http_response_code() supports any version of HTTP)
            http_response_code(405);
            $answer = ['message' => 'HTTP request method ' .  $httpMethod . ' not allowed.'];
        }

        // set the Content-type header of the HTTP response to JSON
        header('Content-type: application/json; charset=UTF-8');

        // and encode the answer into JSON
        echo json_encode($answer);

    }


}
