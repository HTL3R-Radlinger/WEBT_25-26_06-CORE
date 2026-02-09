<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Services\Seeder\MealSeeder;

final class MealplanController extends AbstractController
{
    #[Route('/menu/current', name: 'current_mealplan', methods: ['GET'])]
    public function current(): Response
    {
        $meal_plans = MealSeeder::generate();
        return $this->render('mealplan/index.html.twig', [
            'plan' => $meal_plans[0],
        ]);
    }

    #[Route('/menu/all', name: 'all_mealplans', methods: ['GET'])]
    public function all(): Response
    {
        $meal_plans = MealSeeder::generate();
        return $this->render('meal_plans.html.twig', [
            'meal_plans' => $meal_plans,
        ]);
    }

    #[Route('/menu/{id}', name: 'mealplan_with_id', methods: ['GET'])]
    public function withId(int $id): Response
    {
        $meal_plans = MealSeeder::generate();
        if (!isset($meal_plans[$id])) return $this->redirectToRoute('notfound_page');
        return $this->render('mealplan/index.html.twig', [
            'plan' => $meal_plans[$id],
        ]);
    }
}
