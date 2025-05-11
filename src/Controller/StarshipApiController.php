<?php

namespace App\Controller;

use App\Model\Starship;
// use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class StarshipApiController extends AbstractController
{
    #[Route('/api/starships')]
    public function getCollection(): Response
    {
        $starship = [
            new Starship(
                id: 1,
                name: 'USS Enterprise',
                class: 'NCC-1701-D',
                captain: 'Jean-Luc Picard',
                crew: 1012
            ),
            new Starship(
                id: 2,
                name: 'USS Voyager',
                class: 'NCC-74656',
                captain: 'Kathryn Janeway',
                crew: 150
            ),
            new Starship(
                id: 3,
                name: 'USS Defiant',
                class: 'NX-74205',
                captain: 'Benjamin Sisko',
                crew: 50
            ),
        ];

        return $this->json($starship);
    }

    // protected function json(
    //     mixed $data,
    //     int $status = Response::HTTP_OK,
    //     array $headers = [],
    //     int $jsonOptions = 0
    // ): JsonResponse {
    //     return new JsonResponse($data, $status, $headers, $jsonOptions);
    // }
}