<?php

namespace App\Classes;

use DateTime;

class Meal implements \JsonSerializable
{

    private int $id;
    private string $name;
    private string $allergens;
    private string $nutritionalInfo;
    private DateTime $date;

    function __construct(
        int      $id,
        string   $name,
        string   $allergens,
        string   $nutritionalInfo,
        DateTime $date,
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->allergens = $allergens;
        $this->nutritionalInfo = $nutritionalInfo;
        $this->date = $date;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAllergens(): string
    {
        return $this->allergens;
    }

    public function getNutritionalInfo(): string
    {
        return $this->nutritionalInfo;
    }

    public function getDate(): string
    {
        return $this->date->format('d. M Y');
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
