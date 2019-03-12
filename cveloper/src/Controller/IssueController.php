<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class IssueController extends AbstractController
{
    
    /**
     * @Route("/issue", name="issue")
     */
    public function index()
    {

        return $this->render('issue/index.html.twig', [
            'controller_name' => 'IssueController',
        ]);
    }

    const ROLE_TYPES = array(  
        'owner' => 'cveloper',
        'repo' => 'cveloper-com',
        'issue' => '4',
        'assignees' => ["fruize", "sergiovelmay"],
        'milestone' => ["Agregar Tech"],
        "labels" => ["Technology Request"],
    );


    /**
     * @Route("/issue/result", name="issue_result")
     */
    public function issueResult()
    {
        $usuario = "cveloper";
        $pass =  'S2801vm1985!';
        $respuesta = null;


        $client = new GitHubClient();
        $client->setCredentials($user, $password);


        if(isset($_GET["cuerpo"])) {
            $body = $_GET["cuerpo"];
              if($client->issues->comments->createComment($owner, $repo, $issue, $body, $assignees, $milestone)) {
                  $respuesta =  "Comentario añadido Correctamente";
              } else {
                $respuesta =  "No se ha podido crear el ISSUE";
              }
          }


        return $this->render('issue/result.html.twig', [
            'controller_name' => 'IssueController',
            'result' => $resultado,
        ]);
    }
}
