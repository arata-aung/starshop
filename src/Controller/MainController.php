<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route(path: '/', name: 'home', methods: ['GET'])]
    public function homepage(): Response
    {
        // return new Response(
        //     '<html><body><h1>Welcome to the homepage!</h1></body></html>'
        // );

        $starship = [
            'name' => 'USS Enterprise',
            'class' => 'NCC-1701-D',
            'captain' => 'Jean-Luc Picard',
            'crew' => 1012,
        ];

        $shipcount = 5;

        return $this->render('main/homepage.html.twig',[
            'starship' => $starship,
            'shipcount' => $shipcount
        ]);
    }
}
