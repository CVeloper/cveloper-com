<?php

namespace App\Controller;

use App\Entity\Developer;
use App\Repository\DeveloperRepository;

use App\Entity\Technology;
use App\Repository\TechnologyRepository;

use App\Entity\DevTech;
use App\Repository\DevTechRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(DeveloperRepository $developerRepository, TechnologyRepository $technologyRepository, DevTechRepository $devTechRepository): Response
    {
        return $this->render('search/index.html.twig', [
            'developers' => $developerRepository->findAll(),
            'technologies' => $technologyRepository->findAll(),
            'develTeches' => $devTechRepository->findAll(),
        ]);
    }
}
