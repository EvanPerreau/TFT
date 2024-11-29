<?php

namespace Controllers;

use League\Plates\Engine;
use Models\OriginDAO;
use Models\UnitDAO;

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

    public function displayAddUnit(?string $message = null): void {
        echo $this->templates->render('add-unit', [
            'message' => $message,
            'origins' => (new OriginDAO())->getAll()
        ]);
    }

    public function displayAddUnitOrigin(?string $message = null): void
    {
        echo $this->templates->render('add-origin', [
            'message' => $message
        ]);
    }

    public function addUnitOrigin(array $data): void
    {
        $dao = new OriginDAO();
        try {
            $dao->createOrigin($data);
            header("Location: /?message=Origin successfully added");
        } catch (\Exception $e) {
            $this->displayAddUnitOrigin($e->getMessage());
        }
    }

    public function unitDelete(string $id): void
    {
        $dao = new UnitDAO();
        try {
            $rowCount = $dao->deleteUnit($id);
        } catch (\Exception $e) {
            header("Location: /?message=". $e->getMessage());
            exit();
        }
        if ($rowCount === 0) {
            header("Location: /?message=Unit not found");
            exit();
        }
        header("Location: /?message=Unit successfully deleted");
        exit();
    }

    public function displayEditUnit(string $id, ?string $message = null): void {
        $dao = new UnitDAO();
        $unit = $dao->getById($id);
        if ($unit === null) {
            header("Location: /?message=Unit not found");
            exit();
        }
        $unit->setOrigin((new \Models\UnitDAO())->getOrigins($unit->getId()));
        echo $this->templates->render('add-unit', [
            'unit' => $unit,
            'message' => $message,
            'origins' => (new OriginDAO())->getAll()
        ]);
        exit();
    }

    public function addUnit(array $data): void {
        $dao = new UnitDAO();
        try {
            $dao->createUnit($data);
            header("Location: /?message=Unit successfully added");
        } catch (\Exception $e) {
            $this->displayAddUnit($e->getMessage());
        }
    }

    public function editUnit(array $data)
    {
        $dao = new UnitDAO();
        try {
            $dao->editUnit($data);
            header("Location: /?message=Unit successfully edited");
        } catch (\Exception $e) {
            $this->displayEditUnit($data['id'], $e->getMessage());
        }
    }
}