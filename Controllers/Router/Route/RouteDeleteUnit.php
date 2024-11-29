<?php

namespace Controllers\Router\Route;

use Controllers\Router\Route;
use Controllers\UnitController;

class RouteDeleteUnit extends Route
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
        if (!isset($params['id'])) {
            header("Location: /?message=Unit not found");
            exit();
        }
        $this->controller->unitDelete($params['id']);
    }

    /**
     * @inheritDoc
     */
    function post(array $params = []): void {}
}