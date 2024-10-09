<?php

namespace Controllers;

use League\Plates\Engine;

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
    public function index() : void {
        echo $this->templates->render('home', ['tftSetName' => 'Remix Rumble']);
    }
}