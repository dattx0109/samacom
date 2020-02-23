<?php
namespace App\Service\CharacterJobService;

use App\Repository\Character\CharacterRepository;

class CharacterJobService
{

    private $characterRepository;

    public function __construct(CharacterRepository $characterRepository)
    {
        $this->characterRepository = $characterRepository;
    }

    public function getAllCharacter()
    {
        return $this->characterRepository->getAllCharacter();
    }
}