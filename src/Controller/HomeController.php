<?php

namespace App\Controller;

use App\Repository\BikeRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
    /////////////display the cart/////////////////////////////////////////////////

    #[Route('/', name: 'cart')]
    public function cart(
        SessionInterface $session, 
        BikeRepository $bikeRepository
    )
    {
        $cart = $session->get('cart', []);//Get the cart if exist, otherwise retrieve an empty table
        // dd($cart);

        // Variable initialization to manage the information about the books in the basket
        $data = [];
        $total = 0;

        foreach($cart as $id => $quantity){       //  Create a loop to automate the addition of bikes to the cart

            $bike = $bikeRepository->find($id);   // fetch the next bike id

            $data[] = [                             
                'bike' => $bike,                  // Populate the array with the bike info and his quantity
                'quantity' => $quantity             
            ];

            $total += $bike->getPriceBike() * $quantity;
            // dd($data);
        }

        return $this->render('home/index.html.twig', 
        compact('data', 'total'));
    }
    #[Route('/add/{id}', name: 'add', methods: ['GET'])]
    public function add(Bike $livre, SessionInterface $session)
    {
        $id = $bike->getId();                          
        $cart = $session->get('cart', []);         
        
        
        
        if(empty($cart[$id])){                        // Ajouter le bike dans le cart s'il n'y est pas encore, sinon incrémenter sa quantité
            $cart[$id] = 1;
        }else{
            $cart[$id]++;
        }

        $session->set('cart', $cart);               // populate the cart 
        // dd($session);                                // Pour dumper OU faire un varDump() de la variable $session et voir ce qu'il y a dedans
        return $this->redirectToRoute('cart_index');  // Redirection vers la page du cart
    }
}
