<?php

namespace App\Controller;

use App\Entity\Bike;
use App\Form\BikeType;
use App\Repository\BikeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/bike')]
class BikeController extends AbstractController
{
    #[Route('/', name: 'app_bike_index', methods: ['GET'])]
    public function index(BikeRepository $bikeRepository): Response
    {
        if (!$this->isGranted('ROLE_ADMIN')) {                         
            throw $this->createAccessDeniedException('Accès non autorisé');            
        }
        return $this->render('bike/index.html.twig', [
            'bikes' => $bikeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_bike_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bike = new Bike();
        $form = $this->createForm(BikeType::class, $bike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bike);
            $entityManager->flush();

            return $this->redirectToRoute('app_bike_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bike/new.html.twig', [
            'bike' => $bike,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bike_show', methods: ['GET'])]
    public function show(Bike $bike): Response
    {
        return $this->render('bike/show.html.twig', [
            'bike' => $bike,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bike_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bike $bike, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BikeType::class, $bike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_bike_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bike/edit.html.twig', [
            'bike' => $bike,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bike_delete', methods: ['POST'])]
    public function delete(Request $request, Bike $bike, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bike->getId(), $request->request->get('_token'))) {
            $entityManager->remove($bike);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bike_index', [], Response::HTTP_SEE_OTHER);
    }
}
