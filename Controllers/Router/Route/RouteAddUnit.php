<?php

namespace Controllers\Router\Route;

use Controllers\Router\Route;
use Controllers\UnitController;
use Exception;

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
    function post(array $params = []): void {
        try {
            $data = [
                'name' => $this->getParam($params, 'name', false),
                'image' => $this->getParam($params, 'image', false),
                'cost' => $this->getParam($params, 'cost', false),
                'origin' =>
                    array_map(function($origin) {
                        return ["id"=>intval($origin)];
                    }, $this->getParam($params, "origin", false))
            ];
        } catch (Exception $e) {
            $this->controller->displayAddUnit($e->getMessage());
        }
        $this->controller->addUnit($data);
    }
}