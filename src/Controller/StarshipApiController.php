<?php

namespace App\Controller;

// use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use App\Repository\StarshipRepository;

class StarshipApiController extends AbstractController
{
    #[Route('/api/starships')]
    public function getCollection(StarshipRepository $repository): Response
    {
        // dd($repository);
        $starship = $repository->findAll();

        return $this->json($starship);
    }

    #[Route('/api/starships/{id<\d+>}', methods: ['GET'])]
    public function getItem(StarshipRepository $repository, int $id): Response
    {
        $starship = $repository->find($id);

        if (!$starship) {
            return $this->json(['error' => 'Starship not found'], Response::HTTP_NOT_FOUND);
        }

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