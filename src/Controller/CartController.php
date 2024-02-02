<?php

namespace App\Controller;

use App\Entity\Bike;
use App\Repository\BikeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
#[Route('/cart')]
class CartController extends AbstractController
{
    #[Route('/', name: 'cart_index')]
    public function index(SessionInterface $session, BikeRepository $bikeRepository): Response
    {
        $cart = $session->get('cart', []);//Get the cart if exist, otherwise retrieve an empty table
        // dd($cart);

        // Variable initialization to manage the information about the bike in the cart
        $data = [];    
        $total = 0;            //variable to stock the total price
        $totalQuantity = 0;   //variable to stock the products total quantity

        foreach($cart as $id => $quantity){       //  Create a loop to automate the addition of bikes to the cart

            $bike = $bikeRepository->find($id);   // fetch the next bike by id

            $data[] = [                             
                'bike' => $bike,                  // Populate the array with the bike object and his quantity
                'quantity' => $quantity             
            ];

            $total += $bike->getPriceBike() * $quantity;
            $totalQuantity += $quantity ;
            // dd($data); dump the array for test
        }

        return $this->render('cart/index.html.twig', 
        compact('data', 'total', 'totalQuantity'));
    }
    #[Route('/add/{id}', name: 'add_product', methods: ['GET'])]
    public function add(Bike $bike, SessionInterface $session)
    {
        $id = $bike->getId();                          
        $cart = $session->get('cart', []);         //Get the cart if exist, otherwise retrieve an empty table
        
        
        
        if(empty($cart[$id])){                     // Add bike to cart if it's not there, otherwise increase his quantity by one.
            $cart[$id] = 1;
        }else{
            $cart[$id]++;
        }

        $session->set('cart', $cart);               // populate the cart 
        // dd($session);                            // Equivalent to a varDump for test 
        return $this->redirectToRoute('cart_index');// Redirect to cart page
    }

    #[Route('/remove/{id}', name: 'remove_product')]
    public function remove(Bike $bike, SessionInterface $session)
    {
        $id = $bike->getId();                       // get the bike id
        $cart = $session->get('cart', []);          // get the bike if existe, else get a void array
        
        if(!empty($cart[$id])){                     // remove bike from cart if his quantity reach 0, else decrement its quantity
            
            if($cart[$id] > 1){ 
                $cart[$id]--;                      
            }else{                                      
                unset($cart[$id]);
            }
        }

        $session->set('cart', $cart);               // update the cart 
        return $this->redirectToRoute('cart_index');// Redirect to cart page
    }

    #[Route('/delete/{id}', name: 'delete_product')]
    public function delete(Bike $bike, SessionInterface $session)
    {
        $id = $bike->getId();                          // get the bike id
        $cart = $session->get('cart', []);          // get the cart if existe, else get a void arrayde

        if(!empty($cart[$id])){                       // if the bike exist then delete it from cart                            
            unset($cart[$id]);                        
        }

        $session->set('cart', $cart);               // update the cart 
        return $this->redirectToRoute('cart_index');  // Redirect to cart page
    }

    #[Route('/empty', name: 'empty_cart')]
    public function empty(SessionInterface $session)
    {
        $session->remove('cart');                     //reset the cart
        return $this->redirectToRoute('cart_index');  // Redirect to cart page
    }
}


