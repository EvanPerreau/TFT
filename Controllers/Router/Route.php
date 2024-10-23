<?php

namespace Controllers\Router;

use Exception;

/**
 * Abstract class representing a route in the application.
 */
abstract class Route
{
    public function __construct() {}

    /**
     * Executes an action for the route.
     *
     * @param array $params Parameters for the action.
     * @param string $method HTTP method for the action (default is 'GET').
     */
    public function action(array $params = [], string $method='GET'): void {
        switch ($method) {
            case 'GET':
                $this->get($params);
                break;
            case 'POST':
                $this->post($params);
                break;
            default:
                $this->get($params);
                break;
        }
    }

    /**
     * Retrieves a parameter from an array.
     *
     * @param array $array The array to search for the parameter.
     * @param string $paramName The name of the parameter to retrieve.
     * @param bool $canBeEmpty Whether the parameter can be empty (default is true).
     */
    protected function getParam(array $array, string $paramName, bool $canBeEmpty = true)
    {
        if (!isset($array[$paramName])) {
            throw new Exception("Paramètre '$paramName' absent");
        }

        if (!$canBeEmpty && empty($array[$paramName])) {
            throw new Exception("Paramètre '$paramName' vide");
        }

        return $array[$paramName];
    }

    /**
     * Abstract method to handle GET requests.
     *
     * @param array $params Parameters for the GET request.
     */
    abstract function get(array $params = []): void;

    /**
     * Abstract method to handle POST requests.
     *
     * @param array $params Parameters for the POST request.
     */
    abstract function post(array $params = []): void;
}