<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\StarshipRepository;

class MainController extends AbstractController
{
    #[Route(path: '/', name: 'home', methods: ['GET'])]
    public function homepage(StarshipRepository $repository): Response
    {
        // return new Response(
        //     '<html><body><h1>Welcome to the homepage!</h1></body></html>'
        // );

        $ships = $repository->findAll();
        $shipcount = count($ships);
        $starship = $ships[array_rand($ships)];

        // $starship = [
        //     'name' => 'USS Enterprise',
        //     'class' => 'NCC-1701-D',
        //     'captain' => 'Jean-Luc Picard',
        //     'crew' => 1012,
        // ];

        // $shipcount = 5;

        return $this->render('main/homepage.html.twig',[
            'myShip' => $starship,
            'shipcount' => $shipcount,
            'ships' => $ships,
        ]);
    }
}
