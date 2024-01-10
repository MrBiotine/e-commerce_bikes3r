<?php

namespace App\Controller;

use App\Repository\BikeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(BikeRepository $bikeRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'title' => 'Bikes3R Vente',
            'bikes' => $bikeRepository->findAll(),
            'newbikes' => $bikeRepository->findBy([],["id" => "DESC"],4) //fetch the last  bikes
        ]);
    }
}
