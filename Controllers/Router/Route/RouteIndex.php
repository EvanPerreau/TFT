<?php

namespace Controllers\Router\Route;

use Controllers\MainController;
use Controllers\Router\Route;
use Controllers\UnitController;

class RouteIndex extends Route
{
    private MainController $controller;

    public function __construct(
        $controller
    ) {
       parent::__construct();
       $this->controller = $controller;
    }

    /**
     * @inheritDoc
     */
    function get(array $params = []): void
    {
        $message = $params['message'] ?? null;
        $this->controller->index($message);
    }

    /**
     * @inheritDoc
     */
    function post(array $params = []): void {}
}