<?php

namespace Controllers;

use League\Plates\Engine;
use Models\Unit;
use ReflectionProperty;

/**
 * Class MainController
 *
 * This controller handles the main operations for displaying pages and managing units.
 *
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
     *
     * Initializes the Plates template engine with the 'Views' directory.
     */
    public function __construct() {
        $this->templates = new Engine('Views');
    }

    /**
     * Display the home page.
     *
     * Fetches all units, sets their origins, and renders the 'home' template.
     *
     * @param string|null $message An optional message to display on the home page.
     */
    public function index(string $message = null) : void {
        $dao = new \Models\UnitDAO();
        $listUnits = $dao->getAll();
        echo $this->templates->render('home', ['tftSetName' => 'Remix Rumble',
            'listUnits' => array_map(function(Unit $unit) {
                $unit->setOrigin((new \Models\UnitDAO())->getOrigins($unit->getId()));
                return $unit;
            }, $listUnits),
            'message' => $message]);
    }

    /**
     * Display the search page.
     *
     * Reflects on the Unit class to get its private properties, excluding 'origin',
     * and renders the 'search' template.
     *
     * @param string|null $message An optional message to display on the search page.
     */
    public function search(?string $message = null) : void {
        $reflect = new \ReflectionClass(new Unit());
        $properties = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
        $properties = array_filter($properties, function($property) {
            return $property->getName() !== 'origin';
        });
        echo $this->templates->render('search', ['tftSetName' => 'Remix Rumble', 'properties' => $properties, 'message' => $message]);
    }

    /**
     * Display the search results.
     *
     * Searches for units based on the provided data, sets their origins, and renders the 'search' template.
     *
     * @param array $data The search data containing 'search' and 'property' keys.
     */
    public function displaySearch(array $data): void
    {
        $dao = new \Models\UnitDAO();
        $reflect = new \ReflectionClass(new Unit());
        $properties = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
        $properties = array_filter($properties, function($property) {
            return $property->getName() !== 'origin';
        });
        $listUnits = $dao->search($data['search'], $data['property']);
        echo $this->templates->render('search', ['tftSetName' => 'Remix Rumble', 'properties' => $properties,
            'listUnits' => array_map(function(Unit $unit) {
                $unit->setOrigin((new \Models\UnitDAO())->getOrigins($unit->getId()));
                return $unit;
            }, $listUnits),
            'message' => count($listUnits) === 0 ? 'No results found' : null
        ]);
    }
}