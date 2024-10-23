<?php

namespace Controllers\Router\Route;

use Controllers\MainController;
use Controllers\Router\Route;

class RouteSearch extends Route
{
    private MainController $controller;

    public function __construct($controller)
    {
        parent::__construct();
        $this->controller = $controller;
    }

    /**
     * @inheritDoc
     */
    function get(array $params = []): void
    {
        $this->controller->search();
    }

    /**
     * @inheritDoc
     */
    function post(array $params = []): void
    {
        // TODO: Implement post() method.
    }
}