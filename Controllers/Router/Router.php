<?php

namespace Controllers\Router;

use Controllers\MainController;
use Controllers\Router\Route\RouteAddUnit;
use Controllers\Router\Route\RouteAddUnitOrigin;
use Controllers\Router\Route\RouteDeleteUnit;
use Controllers\Router\Route\RouteEditUnit;
use Controllers\Router\Route\RouteIndex;
use Controllers\Router\Route\RouteSearch;
use Controllers\UnitController;

class Router
{
    /**
     * @var array<string, Route> The list of routes in the application.
     */
    private array $routeList;

    /**
     * @var array<string, object> Dictionary of controllers in the application.
     */
    private array $ctrlList;

    private string $action_key;

    public function __construct(string $name_of_action_key = 'action')
    {
        $this->action_key = $name_of_action_key;
        $this->createControllerList();
        $this->createRouteList();
    }

    private function createControllerList(): void
    {
        $this->ctrlList = [
            'main' => new MainController(),
            'unit' => new UnitController(),
        ];
    }

    private function createRouteList(): void
    {
        $this->routeList = [
            'index' => new RouteIndex($this->ctrlList['main']),
            'add-unit' => new RouteAddUnit($this->ctrlList['unit']),
            'edit-unit' => new RouteEditUnit($this->ctrlList['unit']),
            'del-unit' => new RouteDeleteUnit($this->ctrlList['unit']),
            'add-unit-origin' => new RouteAddUnitOrigin($this->ctrlList['unit']),
            'search' => new RouteSearch($this->ctrlList['main']),
        ];
    }

    public function routing($get, $post): void
    {
        $params = [];
        if (!empty($post)) {
            $method = 'POST';
            $params = $post;
        } else {
            $method = 'GET';
            $params = $get;
        }
        $action = $get[$this->action_key] ?? 'index';

        if (isset($this->routeList[$action])) {
            $route = $this->routeList[$action];
            $route->action($params, $method);
        } else {
            // Handle unknown route
            throw new \Exception("Unknown route: $action");
        }
    }
}