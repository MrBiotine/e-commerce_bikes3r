<?php

namespace App\Controller;

use App\Entity\OrderBike;
use App\Entity\OrderCustomer;
use App\Repository\BikeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
#[Route('/orders', name: 'app_orders_')]
class OrdersController extends AbstractController
{
    #[Route('/add', name: 'add')]
    public function add(SessionInterface $session, BikeRepository $bikeRepository, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted("ROLE_USER");

        $cart = $session->get('cart', []);//Get the cart if exist, otherwise retrieve an empty table
        // dd($cart);
        if($cart === []){
            $this->addFlash('notice', 'votre panier est vide');
            return $this->redirectToRoute('app_home');
        };

         //We get a cart, we create a new order
         $orderCustomer = new OrderCustomer();

         // the order is filled
         $orderCustomer->setUser($this->getUser());
         $orderCustomer->setNumberOrder(uniqid());
 
         // a loop is created to browse the basket and create order details
         foreach($cart as $id => $quantity){
             $orderBike = new OrderBike();
 
             // get the bike by key
             $bike = $bikeRepository->find($id);
                       
 
             // the details order is created
             $orderBike->setBike($bike);
             $orderBike->setQuantityOrder($quantity);
 
             $orderCustomer->addOrderBike($orderBike);
         }
 
         
         $em->persist($orderBike);
         $em->flush();
 
         $session->remove('cart');
 
         $this->addFlash('message', 'Commande créée avec succès');
         return $this->redirectToRoute('app_home');
     


    }
}
