<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController
{
    #[Route(path: '/', name: 'home', methods: ['GET'])]
    public function homepage(): Response
    {
        return new Response(
            '<html><body><h1>Welcome to the homepage!</h1></body></html>'
        );
    }
}
