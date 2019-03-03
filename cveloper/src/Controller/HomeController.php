<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'page_title' => 'CVeloper - Inicio',
        ]);
    }

    /**
     * @Route("/type", name="home_type")
     */
    public function type()
    {
        return $this->render('home/type.html.twig', [
            'controller_name' => 'HomeController',
            'page_title' => 'Selección de Tipo de Usuario',
        ]);
    }
}
