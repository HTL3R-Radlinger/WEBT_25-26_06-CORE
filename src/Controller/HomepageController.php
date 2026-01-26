<?php

namespace App\Controller;

use App\Services\Seeder\MealSeeder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(): Response
    {
        $meal_plans = MealSeeder::generate();
        return $this->render('home.html.twig', ['meal_plans' => $meal_plans]);
    }
}
