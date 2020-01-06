<?php

namespace App\Controller;
use DateTime;
use App\Entity\Person;
use App\Entity\Account;
use App\Entity\Transaction;
use App\Form\TransactionType;
use App\Repository\TransactionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/transaction")
 */
class TransactionController extends AbstractController
{
    /**
     * @Route("/indextransaction/{id}", name="transaction_index", methods={"GET"})
     */
    public function index(TransactionRepository $transactionRepository,Account $account): Response
    {
        return $this->render('transaction/index.html.twig', [
            'transactions' => $transactionRepository->findAll(),
            'account'=>$account
        ]);
    }
/**no se usa mas */
    /**
     * @Route("/new", name="transaction_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $transaction = new Transaction();
        $form = $this->createForm(TransactionType::class, $transaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $datetime = new Datetime();
            $transaction->setDate($datetime);

           $this->creditDebitAccounts($transaction->getCreditAccount(),$transaction->getDebitAccount(),$transaction->getAmount());
           
            $entityManager->persist($transaction);
            $entityManager->flush();
            
            return $this->redirectToRoute('transaction_index');
        }

        return $this->render('transaction/new.html.twig', [
            'transaction' => $transaction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="transaction_show", methods={"GET"})
     */
    public function show(Transaction $transaction): Response
    {
        return $this->render('transaction/show.html.twig', [
            'transaction' => $transaction,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="transaction_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Transaction $transaction): Response
    {
        $form = $this->createForm(TransactionType::class, $transaction);
        $oldTransaction=clone $transaction;
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->creditDebitAccounts($transaction->getCreditAccount(),$transaction->getDebitAccount(),$transaction->getAmount()-$oldTransaction->getAmount());

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('transaction_index');
        }

        return $this->render('transaction/edit.html.twig', [
            'transaction' => $transaction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="transaction_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Transaction $transaction): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transaction->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $this->creditDebitAccounts($transaction->getCreditAccount(),$transaction->getDebitAccount(),-$transaction->getAmount());

            $entityManager->remove($transaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('transaction_index');
    }


    private function creditDebitAccounts(Account $creditAccount,Account $debitAccount,$amount){
        ///cojemos valores que tienen las 2 cuentas 
    /*    $valorCredit=$transaction->getCreditAccount()->getBalance();
        $valorDebit=$transaction->getDebitAccount()->getBalance();

        //Modificamos los valores

        $transaction->getCreditAccount()->setBalance($valorCredit+$transaction->getAmount());
        $transaction->getDebitAccount()->setBalance($valorDebit-$transaction->getAmount());
        */    
            $creditAccount->setBalance($creditAccount->getBalance()+$amount);
            $debitAccount->setBalance($debitAccount->getBalance()-$amount);
            
    }

}
