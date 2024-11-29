<?php

namespace Controllers\Router\Route;

use Controllers\Router\Route;
use Controllers\UnitController;

class RouteEditUnit extends Route
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
        $this->controller->displayEditUnit($params['id']);
    }

    /**
     * @inheritDoc
     */
    function post(array $params = []): void {
        try {
            $data = [
                'id' => $this->getParam($params, 'id', false),
                'name' => $this->getParam($params, 'name', false),
                'image' => $this->getParam($params, 'image', false),
                'cost' => $this->getParam($params, 'cost', false),
                'origin' =>
                    array_map(function($origin) {
                        return ["id"=>intval($origin)];
                    }, $this->getParam($params, "origin", false))
            ];
        } catch (\Exception $e) {
            if (isset($params['id'])) {
                $this->controller->displayEditUnit($params['id']);
            } else {
                header("Location: /?message=". $e->getMessage());
            }
        }
        $this->controller->editUnit($data);
    }
}