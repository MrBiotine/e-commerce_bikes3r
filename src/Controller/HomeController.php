<?php

namespace App\Controller;

use App\Entity\Bike;
use App\Repository\BikeRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
#[Route('/home')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(BikeRepository $bikeRepository): Response
    {
        return $this->render('home/index.html.twig', [
                    
            'bikes' => $bikeRepository->findBy([],["nameBike" => "ASC"],6),
            'newbikes' => $bikeRepository->findBy([],["id" => "DESC"],4) //fetch the last  bikes
        ]);
    }
    /////////////Add a bike in the cart/////////////////////////////////////////////////

    
    #[Route('/cart/add/{id}', name: 'add', methods: ['GET'])]
    public function add(Bike $bike, SessionInterface $session)
    {
        $id = $bike->getId();                          
        $cart = $session->get('cart', []);         
        
        
        
        if(empty($cart[$id])){                       
            $cart[$id] = 1;
        }else{
            $cart[$id]++;
        }
        
        $session->set('cart', $cart);// update the cart
        $this->addFlash(                                   // Send a notification
            'success',
            'un vélo ajouté au panier'
        );               
        // dd($session);                                // display the session content for test
        return $this->redirectToRoute('app_home');  // redirect to home
    }
}
