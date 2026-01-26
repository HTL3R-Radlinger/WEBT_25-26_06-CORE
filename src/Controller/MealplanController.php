<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MealplanController extends AbstractController
{
    #[Route('/menu/current', name: 'app_mealplan')]
    public function index(): Response
    {
        return $this->render('mealplan/index.html.twig', [
            'controller_name' => 'MealplanController',
        ]);
    }
}
