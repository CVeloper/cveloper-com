<?php
// src/Controller/LuckyController.php
namespace App\Controller;

//use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ComoQuieras extends AbstractController
{
    /**
        * @Route("/prueba/symfony/primera")
    */

    public function generarPagina()
    {
      function color_rand() {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
      }
      $nombre = "CVeloper";
      $color =   color_rand();
      $data = ["Mi texto", "Texto2", "Texto3"];

        return $this->render('ejercicios/template1.html.twig', [
              'nombre' => $nombre,
              'color' => $color,
              'data' => $data
          ]);
    }
}
?>
