<?php

namespace App\Repository;
use Psr\Log\LoggerInterface;
use App\Model\Starship;
use App\Model\StarshipStatusEnum;

class StarshipRepository
{
    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    // This class will handle the database operations for the Starship entity.
    // For now, we can leave it empty or add some basic methods.
    
    public function findAll()
    {
        // Logic to retrieve all starships from the database

        $this->logger->info('Retrieving all starships');

        $starship = [
            new Starship(
                id: 1,
                name: 'USS Enterprise',
                class: 'NCC-1701-D',
                captain: 'Jean-Luc Picard',
                crew: 1012,
                status: StarshipStatusEnum::WAITING
            ),
            new Starship(
                id: 2,
                name: 'USS Voyager',
                class: 'NCC-74656',
                captain: 'Kathryn Janeway',
                crew: 150,
                status: StarshipStatusEnum::IN_PROGRESS
            ),
            new Starship(
                id: 3,
                name: 'USS Defiant',
                class: 'NX-74205',
                captain: 'Benjamin Sisko',
                crew: 50,
                status: StarshipStatusEnum::COMPLETED
            ),
        ];

        return $starship;
    }

    public function find($id): ?Starship
    {
        foreach ($this->findAll() as $starship) {
            if ($starship->getId() === $id) {
                return $starship;
            }
        }

        return null;
    }
}