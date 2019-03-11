<?php

namespace App\Controller;

use App\Entity\Developer;
use App\Form\DeveloperType;
use App\Repository\DeveloperRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/developer/personal")
 */
class DeveloperController extends AbstractController
{
    /**
     * @Route("/", name="developer_index", methods={"GET"})
     */
    public function index(DeveloperRepository $developerRepository): Response
    {
        // modifico esto porque quiero que sólo muestre sus propios datos
        // return $this->render('developer/index.html.twig', [
        //     'developers' => $developerRepository->findAll(),
        // ]);

        // recojo el id_developer de la session del usuario-desarrollador
        $id = $this->get('session')->get('myDeveloperId');

        // pinto el template correspondiente al home de developer
        return $this->render('developer/home.html.twig', [
            // creo un nuevo método con la consulta restringida a su id
            'developer' => $developerRepository->findMe($id)
        ]);
    }

    /**
     * @Route("/new", name="developer_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $developer = new Developer();
        $form = $this->createForm(DeveloperType::class, $developer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($developer);
            $entityManager->flush();

            return $this->redirectToRoute('developer_index');
        }

        return $this->render('developer/new.html.twig', [
            'developer' => $developer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="developer_show", methods={"GET"})
     */
    public function show(Developer $developer): Response
    {
        return $this->render('developer/show.html.twig', [
            'developer' => $developer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="developer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Developer $developer): Response
    {
        $form = $this->createForm(DeveloperType::class, $developer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('developer_index', [
                'id' => $developer->getId(),
            ]);
        }

        return $this->render('developer/edit.html.twig', [
            'developer' => $developer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="developer_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Developer $developer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$developer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($developer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('developer_index');
    }
}
