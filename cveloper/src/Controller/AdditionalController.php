<?php

namespace App\Controller;

use App\Entity\Additional;
use App\Form\AdditionalType;
use App\Repository\AdditionalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dev/additional")
 */
class AdditionalController extends AbstractController
{
    /**
     * @Route("/", name="additional_index", methods={"GET"})
     */
    public function index(AdditionalRepository $additionalRepository): Response
    {
        return $this->render('additional/index.html.twig', [
            'additionals' => $additionalRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="additional_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $additional = new Additional();
        $form = $this->createForm(AdditionalType::class, $additional);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($additional);
            $entityManager->flush();

            return $this->redirectToRoute('additional_index');
        }

        return $this->render('additional/new.html.twig', [
            'additional' => $additional,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="additional_show", methods={"GET"})
     */
    public function show(Additional $additional): Response
    {
        return $this->render('additional/show.html.twig', [
            'additional' => $additional,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="additional_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Additional $additional): Response
    {
        $form = $this->createForm(AdditionalType::class, $additional);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('additional_index', [
                'id' => $additional->getId(),
            ]);
        }

        return $this->render('additional/edit.html.twig', [
            'additional' => $additional,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="additional_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Additional $additional): Response
    {
        if ($this->isCsrfTokenValid('delete'.$additional->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($additional);
            $entityManager->flush();
        }

        return $this->redirectToRoute('additional_index');
    }
}
