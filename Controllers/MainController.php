<?php

namespace Controllers;

use League\Plates\Engine;
use Models\Unit;
use ReflectionProperty;

/**
 * Class MainController
 * @package Controllers
 */
class MainController
{
    /**
     * @var Engine $templates The Plates Engine instance.
     */
    private Engine $templates;

    /**
     * MainController constructor.
     */
    public function __construct() {
        $this->templates = new Engine('Views');
    }

    /**
     * Display the home page.
     */
    public function index(string $message = null) : void {
        $dao = new \Models\UnitDAO();
        $listUnits = $dao->getAll();
        echo $this->templates->render('home', ['tftSetName' => 'Remix Rumble', 'listUnits' => $listUnits, 'message' => $message]);
    }

    /**
     * Display the search page
     */
    public function search(): void {
        $reflect = new \ReflectionClass(new Unit());
        $properties = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
        echo $this->templates->render('search', ['tftSetName' => 'Remix Rumble', 'properties' => $properties]);
    }
}