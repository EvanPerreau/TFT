<?php

namespace Controllers\Router\Route;

use Controllers\Router\Route;
use Controllers\UnitController;

class RouteAddUnitOrigin extends Route
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
        $this->controller->displayAddUnitOrigin();
    }

    /**
     * @inheritDoc
     */
    function post(array $params = []): void {
        try {
            $data = [
                'name' => $this->getParam($params, 'name', false),
                'image' => $this->getParam($params, 'image', false),
            ];
        } catch (\Exception $e) {
            $this->controller->displayAddUnitOrigin($e->getMessage());
        }
        $this->controller->addUnitOrigin($data);
    }
}