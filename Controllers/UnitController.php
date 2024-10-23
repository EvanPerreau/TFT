<?php

namespace Controllers;

use League\Plates\Engine;

class UnitController
{
    /**
     * @var Engine $templates The Plates Engine instance.
     */
    private Engine $templates;

    /**
     * UnitController constructor.
     */
    public function __construct() {
        $this->templates = new Engine('Views');
    }

    public function displayAddUnit(): void {
        echo $this->templates->render('add-unit');
    }

    public function displayAddUnitOrigin(): void
    {
        echo $this->templates->render('add-origin');
    }

    public function displayUnitDelete(): void
    {
        header("Location: /?message=Unit successfully deleted");
        exit();
    }

    public function displayEditUnit(int $id): void {
        header("Location: /?action=add-unit&id=". $id ."");
        exit();
    }
}