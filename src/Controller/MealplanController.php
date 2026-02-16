<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Services\Seeder\MealSeeder;

#[Route('/menu')]
final class MealplanController extends AbstractController
{
    // Controller for the current Mealplan (id = 0)
    #[Route('/current', name: 'current_mealplan', methods: ['GET'])]
    public function current(MealSeeder $mealSeeder): Response
    {
        $meal_plans = $mealSeeder::generate();
        return $this->render('mealplan/index.html.twig', [
            'plan' => $meal_plans[0],
        ]);
    }

    // Controller for all the Mealplans
    #[Route('/all', name: 'all_mealplans', methods: ['GET'])]
    public function all(): Response
    {
        $meal_plans = MealSeeder::generate();
        return $this->render('meal_plans.html.twig', [
            'meal_plans' => $meal_plans,
        ]);
    }

    // Controller for a specific Mealplan (id is given as route path)
    #[Route(
        '/{id}',
        name: 'mealplan_with_id',
        requirements: ['id' => '\d+'],
        methods: ['GET']
    )]
    public function withId(int $id): Response
    {
        $meal_plans = MealSeeder::generate();
        if (!isset($meal_plans[$id])) return $this->redirectToRoute('notfound_page'); // When id is not found -> show 404 page
        return $this->render('mealplan/index.html.twig', [
            'plan' => $meal_plans[$id],
        ]);
    }
}
