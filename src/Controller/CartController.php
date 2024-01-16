<?php

namespace App\Controller;

use App\Repository\BikeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
#[Route('/cart')]
class CartController extends AbstractController
{
    #[Route('/', name: 'app_cart')]
    public function index(SessionInterface $session, BikeRepository $bikeRepository): Response
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

        return $this->render('cart/index.html.twig', 
        compact('data', 'total'));
    }
    #[Route('/add/{id}', name: 'add_cart', methods: ['GET'])]
    public function add(Bike $bike, SessionInterface $session)
    {
        $id = $bike->getId();                          
        $cart = $session->get('cart', []);         //Get the cart if exist, otherwise retrieve an empty table
        
        
        
        if(empty($cart[$id])){                        // Add bike to cart if it's not there, otherwise increase his quantity by one.
            $cart[$id] = 1;
        }else{
            $cart[$id]++;
        }

        $session->set('cart', $cart);               // populate the cart 
        // dd($session);                                // Pour dumper OU faire un varDump() de la variable $session et voir ce qu'il y a dedans
        return $this->redirectToRoute('cart_index');  // Redirect to cart page
    }

    #[Route('/remove/{id}', name: 'remove')]
    public function remove(Bike $bike, SessionInterface $session)
    {
        $id = $bike->getId();                          // get the bike id
        $cart = $session->get('cart', []);          // get the bike if existe, else get a void array
        
        if(!empty($cart[$id])){                       // remove bike from cart if his quantity reach 0, else decrement its quantity
            
            if($cart[$id] > 1){ 
                $cart[$id]--;                      
            }else{                                      
                unset($cart[$id]);
            }
        }

        $session->set('cart', $cart);               // update the cart 
        return $this->redirectToRoute('cart_index');  // Redirect to cart page
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function delete(Bike $bike, SessionInterface $session)
    {
        $id = $bike->getId();                          // get the bike id
        $panier = $session->get('cart', []);          // get the cart if existe, else get a void arrayde

        if(!empty($cart[$id])){                       // if the bike exist then delte it from cart                            
            unset($cart[$id]);                        
        }

        $session->set('cart', $cart);               // update the cart 
        return $this->redirectToRoute('cart_index');  // Redirect to cart page
    }

    #[Route('/empty', name: 'empty')]
    public function empty(SessionInterface $session)
    {
        $session->remove('cart');                     //reset the cart
        return $this->redirectToRoute('cart_index');  // Redirect to cart page
    }
}


