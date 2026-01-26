<?php

namespace App\Classes;

class MealPlan
{
    private int $id;
    private string $name;
    private string $schoolName;
    private string $weekOfDelivery;
    private array $meals;

    function __construct(int $id, string $name, string $schoolName, string $weekOfDelivery, array $meals)
    {
        $this->id = $id;
        $this->name = $name;
        $this->schoolName = $schoolName;
        $this->weekOfDelivery = $weekOfDelivery;
        $this->meals = $meals;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSchoolName(): string
    {
        return $this->schoolName;
    }

    public function getWeekOfDelivery(): string
    {
        return $this->weekOfDelivery;
    }

    public function getMeals(): array
    {
        return $this->meals;
    }
}
