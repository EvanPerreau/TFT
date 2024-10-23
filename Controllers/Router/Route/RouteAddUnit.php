<?php

namespace Controllers\Router\Route;

use Controllers\Router\Route;
use Controllers\UnitController;

class RouteAddUnit extends Route
{
    private UnitController $controller;

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
        $this->controller->displayAddUnit();
    }

    /**
     * @inheritDoc
     */
    function post(array $params = []): void {}
}