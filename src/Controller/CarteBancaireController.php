<?php

namespace App\Controller;

use App\Entity\CarteBancaire;
use App\Form\CarteBancaireType;
use App\Repository\CarteBancaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/carte/bancaire")
 */
class CarteBancaireController extends AbstractController
{
    /**
     * @Route("/", name="carte_bancaire_index", methods={"GET"})
     */
    public function index(CarteBancaireRepository $carteBancaireRepository): Response
    {
        return $this->render('carte_bancaire/index.html.twig', [
            'carte_bancaires' => $carteBancaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="carte_bancaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $carteBancaire = new CarteBancaire();
        $form = $this->createForm(CarteBancaireType::class, $carteBancaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($carteBancaire);
            $entityManager->flush();

            return $this->redirectToRoute('carte_bancaire_index');
        }

        return $this->render('carte_bancaire/new.html.twig', [
            'carte_bancaire' => $carteBancaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="carte_bancaire_show", methods={"GET"})
     */
    public function show(CarteBancaire $carteBancaire): Response
    {
        return $this->render('carte_bancaire/show.html.twig', [
            'carte_bancaire' => $carteBancaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="carte_bancaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CarteBancaire $carteBancaire): Response
    {
        $form = $this->createForm(CarteBancaireType::class, $carteBancaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('carte_bancaire_index');
        }

        return $this->render('carte_bancaire/edit.html.twig', [
            'carte_bancaire' => $carteBancaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="carte_bancaire_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CarteBancaire $carteBancaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$carteBancaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($carteBancaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('carte_bancaire_index');
    }
}
