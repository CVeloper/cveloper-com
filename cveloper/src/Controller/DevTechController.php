<?php

namespace App\Controller;

use App\Entity\DevTech;
use App\Form\DevTechType;
use App\Repository\DevTechRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dev/technology")
 */
class DevTechController extends AbstractController
{
    /**
     * @Route("/", name="dev_tech_index", methods={"GET"})
     */
    public function index(DevTechRepository $devTechRepository): Response
    {
        return $this->render('dev_tech/index.html.twig', [
            'dev_teches' => $devTechRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="dev_tech_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $devTech = new DevTech();
        $form = $this->createForm(DevTechType::class, $devTech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($devTech);
            $entityManager->flush();

            return $this->redirectToRoute('dev_tech_index');
        }

        return $this->render('dev_tech/new.html.twig', [
            'dev_tech' => $devTech,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dev_tech_show", methods={"GET"})
     */
    public function show(DevTech $devTech): Response
    {
        return $this->render('dev_tech/show.html.twig', [
            'dev_tech' => $devTech,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="dev_tech_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DevTech $devTech): Response
    {
        $form = $this->createForm(DevTechType::class, $devTech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('dev_tech_index', [
                'id' => $devTech->getId(),
            ]);
        }

        return $this->render('dev_tech/edit.html.twig', [
            'dev_tech' => $devTech,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="dev_tech_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DevTech $devTech): Response
    {
        if ($this->isCsrfTokenValid('delete'.$devTech->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($devTech);
            $entityManager->flush();
        }

        return $this->redirectToRoute('dev_tech_index');
    }
}
