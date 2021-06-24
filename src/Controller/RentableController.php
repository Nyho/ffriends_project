<?php

namespace App\Controller;

use App\Entity\Rentable;
use App\Form\RentableType;
use App\Repository\RentableRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class RentableController extends AbstractController
{
    /**
     * @Route("/", name="rentable_index", methods={"GET"})
     */
    public function index(RentableRepository $rentableRepository): Response
    {
        return $this->render('rentable/index.html.twig', [
            'rentables' => $rentableRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rentable_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rentable = new Rentable();
        $form = $this->createForm(RentableType::class, $rentable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rentable);
            $entityManager->flush();

            return $this->redirectToRoute('rentable_index');
        }

        return $this->render('rentable/new.html.twig', [
            'rentable' => $rentable,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rentable_show", methods={"GET"})
     */
    public function show(Rentable $rentable): Response
    {
        return $this->render('rentable/show.html.twig', [
            'rentable' => $rentable,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rentable_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Rentable $rentable): Response
    {
        $form = $this->createForm(RentableType::class, $rentable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rentable_index');
        }

        return $this->render('rentable/edit.html.twig', [
            'rentable' => $rentable,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rentable_delete", methods={"POST"})
     */
    public function delete(Request $request, Rentable $rentable): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rentable->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rentable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rentable_index');
    }
}
