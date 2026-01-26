<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Services\Seeder\MealSeeder;

final class MealplanController extends AbstractController
{
    #[Route('/menu/current', name: 'app_mealplan')]
    public function index(): Response
    {
        $meal_plans = MealSeeder::generate();
        return $this->render('mealplan/index.html.twig', [
            'plan' => $meal_plans[0],
        ]);
    }
}
