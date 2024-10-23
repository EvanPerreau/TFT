<?php

namespace Models;

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
}