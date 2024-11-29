<?php

namespace Models;

use Exception;

class OriginDAO extends BasePDODAO
{
    public function getAll(): array
    {
        $result = $this->execRequest("SELECT * FROM ORIGIN");
        $origins = array();
        while ($row = $result->fetch()) {
            $origin = new Origin();
            $origin->setId($row['id']);
            $origin->setName($row['name']);
            $origin->setImage($row['url_img']);
            $origins[] = $origin;
        }
        return $origins;
    }

    public function getById(int $id): ?Origin
    {
        $result = $this->execRequest("SELECT * FROM ORIGIN WHERE id = ?", [$id]);
        if ($row = $result->fetch()) {
            $origin = new Origin();
            $origin->setId($row['id']);
            $origin->setName($row['name']);
            $origin->setImage($row['url_img']);
            return $origin;
        } else {
            return null;
        }
    }

    public function createOrigin(array $data): void
    {
        if (!isset($data['name']) || !isset($data['image'])) {
            throw new Exception("Missing data");
        }
        if (!$this->execRequest("INSERT INTO ORIGIN (name, url_img) VALUES (?, ?)", [$data['name'], $data['image']])) {
            throw new Exception("Error while creating the origin");
        }
    }
}