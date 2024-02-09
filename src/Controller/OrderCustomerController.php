<?php

namespace App\Controller;

use App\Entity\OrderCustomer;
use App\Form\OrderCustomerType;
use App\Repository\OrderCustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/order/customer')]
class OrderCustomerController extends AbstractController
{
    #[Route('/admin', name: 'app_order_customer_index', methods: ['GET'])]
    public function index(OrderCustomerRepository $orderCustomerRepository): Response
    {
        return $this->render('order_customer/index.html.twig', [
            'order_customers' => $orderCustomerRepository->findAll(),
        ]);
    }

    #[Route('/admin/new', name: 'app_order_customer_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $orderCustomer = new OrderCustomer();
        $form = $this->createForm(OrderCustomerType::class, $orderCustomer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($orderCustomer);
            $entityManager->flush();

            return $this->redirectToRoute('app_order_customer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('order_customer/new.html.twig', [
            'order_customer' => $orderCustomer,
            'form' => $form,
        ]);
    }

    #[Route('/admin/{id}', name: 'app_order_customer_show', methods: ['GET'])]
    public function show(OrderCustomer $orderCustomer): Response
    {
        return $this->render('order_customer/show.html.twig', [
            'order_customer' => $orderCustomer,
        ]);
    }
    #[Route('/admin/{id}/edit', name: 'editOrder', methods: ['GET', 'POST'])]
    public function editOrder(Request $request, OrderCustomer $orderCustomer, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OrderCustomerType::class, $orderCustomer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_order_customer_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('order_customer/edit.html.twig', [
            'order_customer' => $orderCustomer,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'detail_order', methods: ['GET'])]
    public function detailOrder(OrderCustomer $orderCustomer): Response
    {
        return $this->render('order_customer/detail_order.html.twig', [
            'order_customer' => $orderCustomer,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_order_customer_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OrderCustomer $orderCustomer, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OrderCustomerType::class, $orderCustomer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $orderId = $orderCustomer->getId();
            return $this->redirectToRoute('detail_order', ['id' => $orderId], Response::HTTP_SEE_OTHER);
        }

        return $this->render('order_customer/edit.html.twig', [
            'order_customer' => $orderCustomer,
            'form' => $form,
        ]);
    }
    
    #[Route('/{id}', name: 'app_order_customer_delete', methods: ['POST'])]
    public function delete(Request $request, OrderCustomer $orderCustomer, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$orderCustomer->getId(), $request->request->get('_token'))) {
            $entityManager->remove($orderCustomer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_order_customer_index', [], Response::HTTP_SEE_OTHER);
    }
}
