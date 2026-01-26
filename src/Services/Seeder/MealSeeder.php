<?php

namespace App\Services\Seeder;

use App\Classes\Meal;
use App\Classes\MealPlan;
use DateMalformedStringException;
use DateTime;

class MealSeeder
{
    public static function generate(): array
    {
        $plans = [];
        $anz_plans = 3;
        $meal_id = 0;
        for ($plans_index = 0; $plans_index < $anz_plans; $plans_index++) {
            $meals = [];
            $anz_meals = 4;
            for ($meal_index = 0; $meal_index < $anz_meals; $meal_index++) {
                try {
                    $date = new DateTime("2026-" . rand(1, 12) . "-" . rand(1, 28));
                } catch (DateMalformedStringException $e) {
                    exit();
                }
                $meals[] = new Meal(
                    $meal_id,
                    "Meal $meal_index",
                    "Gluten, Lactose",
                    "Calories: " . rand(400, 700),
                    $date,
                );
                $meal_id++;
            }
            $plans[] = new MealPlan(
                $plans_index,
                "Meal Plan $plans_index",
                "HTL Rennweg",
                "Week $plans_index",
                $meals
            );
        }
        return $plans;
    }
}
