<?php

namespace App\Controller;

use App\Entity\Account;
use App\Entity\Category;
use App\Form\AccountType;
use App\Repository\TransactionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
    /**
     * @Route("/diagrama", name="diagrama_index")
     */
    public function diagrama(TransactionRepository $tr)
    {
        $transactions = $tr->findByCategory();
        return $this->render('diagram/diagram.html.twig', [
            'controller_name' => 'HomeController',
            'transactions' => $transactions
        ]);
    }

     /**
     * @Route("/diagrama/{id}", name="diagrama_index")
     */
    public function diagramaId(TransactionRepository $tr,Account $account)
    {
        $transactions = $tr->findByCategory($account->getId());
        return $this->render('diagram/diagram.html.twig', [
            'controller_name' => 'HomeController',
            'transactions' => $transactions
        ]);
    }

  

    /**
     * @Route("/{id}/stat", name="account_stat", methods={"GET","POST"})
     */
    public function stat(Request $request, Account $account): Response
    {
        $form = $this->createForm(AccountType::class, $account);
        $form->handleRequest($request);
        $categories = $this->getDoctrine()->getRepository(Category::class)->findByAccount($account->getId());
        dump($categories);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('account_index');
        }

        return $this->render('diagram/diagram.html.twig', [
            'account' => $account,
            'form' => $form->createView(),
            'categories' => $categories,
        ]);
    }
    
}
