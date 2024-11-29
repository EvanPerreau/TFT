<?php

namespace Models;

use Exception;
use Models\BasePDODAO;

class UnitDAO extends BasePDODAO
{
    /**
     * Retrieves all units from the database.
     *
     * @return Unit[] The list of units.
     */
    public function getAll(): array
    {
        $result = $this->execRequest("SELECT * FROM UNIT");
        $units = array();
        while ($row = $result->fetch()) {
            $unit = new Unit();
            $unit->setId($row['id']);
            $unit->setName($row['name']);
            $unit->setCost($row['cost']);
            $unit->setUrlImg($row['url_img']);
            $units[] = $unit;
        }
        return $units;
    }

    /**
     * Retrieves a unit by its ID.
     *
     * @param string $id The ID of the unit to retrieve.
     * @return Unit|null The unit, or null if not found.
     */
    public function getById(string $id): ?Unit
    {
        $result = $this->execRequest("SELECT * FROM UNIT WHERE id = ?", [$id]);
        if ($row = $result->fetch()) {
            $unit = new Unit();
            $unit->setId($row['id']);
            $unit->setName($row['name']);
            $unit->setCost($row['cost']);
            $unit->setUrlImg($row['url_img']);
            return $unit;
        } else {
            return null;
        }
    }

    /**
     * @throws Exception If the data is missing.
     */
    public function createUnit(array $data): void
    {
        if (!isset($data['name']) || !isset($data['cost']) || !isset($data['image'])) {
            throw new Exception("Missing data");
        }
        $id = uniqid();
        $result = $this->execRequest("INSERT INTO UNIT (
            id,
            name,
            cost,
            url_img
        ) VALUES (?, ?, ?, ?)", [
            $id,
            $data['name'],
            $data['cost'],
            $data['image'],
        ]);
        if (!$result) {
            throw new Exception("Error while creating the unit");
        }
        foreach ($data['origin'] as $origin) {
            $this->addOrigin([
                'id' => $id,
                'origin' => $origin['id']
            ]);
        }
    }

    public function deleteUnit(string $id): int
    {
        $result = $this->execRequest("DELETE FROM UNIT WHERE id = ?", [$id]);
        if (!$result) {
            throw new Exception("Error while deleting the unit");
        }
        return $result->rowCount();
    }

    public function editUnit(array $data)
    {
        if (!isset($data['id']) || !isset($data['name']) || !isset($data['cost']) || !isset($data['image']) || !isset($data['origin'])) {
            throw new Exception("Missing data");
        }
        $result = $this->execRequest("UPDATE UNIT SET
            name = ?,
            cost = ?,
            url_img = ?
        WHERE id = ?", [
            $data['name'],
            $data['cost'],
            $data['image'],
            $data['id']
        ]);
        if (!$result) {
            throw new Exception("Error while editing the unit");
        }
        $unit = $this->getById($data['id']);
        $this->execRequest("DELETE FROM UNIT_ORIGIN WHERE id_unit = ?", [$unit->getId()]);
        foreach ($data['origin'] as $origin) {
            $this->addOrigin([
                'id' => $unit->getId(),
                'origin' => $origin['id']
            ]);
        }
    }

    /**
     * Retrieves the origins of a unit.
     *
     * @param string $id The ID of the unit.
     * @return Origin[] The list of origins.
     */
    public function getOrigins(string $id): array
    {
        $result = $this->execRequest("SELECT * FROM UNIT_ORIGIN JOIN ORIGIN ON UNIT_ORIGIN.id_origin = ORIGIN.id WHERE id_unit = ?", [$id]);
        $origins = array();
        while ($row = $result->fetch()) {
            $origin = new Origin();
            $origin->setName($row['name']);
            $origin->setImage($row['url_img']);
            $origin->setId($row['id_origin']);
            $origins[] = $origin;
        }
        return $origins;
    }

    public function addOrigin(array $data): void
    {
        if (!isset($data['id']) || !isset($data['origin'])) {
            throw new Exception("Missing data");
        }
        if (!$this->execRequest("INSERT INTO UNIT_ORIGIN (id_unit, id_origin) VALUES (?, ?)", [$data['id'], $data['origin']])) {
            throw new Exception("Error while adding the origin");
        }
    }

    public function search(string $search, string $property)
    {
        $result = $this->execRequest("SELECT * FROM UNIT WHERE $property LIKE ?", ["%$search%"]);
        $units = array();
        while ($row = $result->fetch()) {
            $unit = new Unit();
            $unit->setId($row['id']);
            $unit->setName($row['name']);
            $unit->setCost($row['cost']);
            $unit->setUrlImg($row['url_img']);
            $units[] = $unit;
        }
        return $units;
    }
}