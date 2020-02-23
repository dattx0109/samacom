<?php
namespace App\Service\Character;

use App\Repository\Character\CharacterRepository;

class CharacterService
{
    private $characterRepository;

    public function __construct(CharacterRepository $characterRepository)
    {
        $this->characterRepository = $characterRepository;
    }

    public function getAllCharacter()
    {
        $data =  $this->characterRepository->getAllCharacter();
        return $this->refactorData($data);
    }

    public function refactorData($rawData)
    {
        $rawDataNew = [];
        foreach ($rawData as $key => $item){
            $rawDataNew[] = [
                'id' => $key,
                'name' => $item
            ];
        }
        return $rawDataNew;
    }
}
