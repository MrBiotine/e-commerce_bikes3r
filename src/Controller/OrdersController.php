<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
#[Route('/orders', name: 'app_orders_')]
class OrdersController extends AbstractController
{
    #[Route('/add', name: 'add')]
    public function add(SessionInterface $session): Response
    {
        $this->denyAccessUnlessGranted("ROLE_USER");

        $cart = $session->get('cart', []);//Get the cart if exist, otherwise retrieve an empty table
        // dd($cart);
if($cart === []){
    $this->addFlash('notice', 'votre panier est vide');
    $this->redirectToRoute('app_home');
})

        return $this->render('orders/index.html.twig', [
            'controller_name' => 'OrdersController',
        ]);
    }
}
