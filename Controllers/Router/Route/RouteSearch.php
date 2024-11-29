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
        try {
            $data = [
                'search' => $this->getParam($params, 'search', false),
                'property' => $this->getParam($params, 'property', false),
            ];
        } catch (\Exception $e) {
            $this->controller->search($e->getMessage());
        }

        $this->controller->displaySearch($data);
    }
}