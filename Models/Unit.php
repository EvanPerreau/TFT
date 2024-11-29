<?php

namespace Models;

class Unit
{
    public function getOrigin(): array
    {
        return $this->origin;
    }

    public function setOrigin(array $origin): void
    {
        $this->origin = $origin;
    }
    /**
     * Retrieves the ID of the unit.
     *
     * @return string|null The ID of the unit, or null if not set.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets the ID of the unit.
     *
     * @param string|null $id The ID to set.
     * @return void
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Retrieves the name of the unit.
     *
     * @return string The name of the unit.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets the name of the unit.
     *
     * @param string $name The name to set.
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Retrieves the cost of the unit.
     *
     * @return int The cost of the unit.
     */
    public function getCost(): int
    {
        return $this->cost;
    }

    /**
     * Sets the cost of the unit.
     *
     * @param int $cost The cost to set.
     * @return void
     */
    public function setCost(int $cost): void
    {
        $this->cost = $cost;
    }

    /**
     * Retrieves the URL of the unit's image.
     *
     * @return string The URL of the unit's image.
     */
    public function getUrlImg(): string
    {
        return $this->url_img;
    }

    /**
     * Sets the URL of the unit's image.
     *
     * @param string $url_img The URL to set.
     * @return void
     */
    public function setUrlImg(string $url_img): void
    {
        $this->url_img = $url_img;
    }

    /**
     * @var string|null The ID of the unit.
     */
    private ?string $id;

    /**
     * @var string The name of the unit.
     */
    private string $name;

    /**
     * @var int The cost of the unit.
     */
    private int $cost;

    /**
     * @var string The URL of the unit's image.
     */
    private string $url_img;

    /**
     * Retrieves the origin of the unit.
     *
     * @return Origin[] The origin of the unit.
     */
    private array $origin;

    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}