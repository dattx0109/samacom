<?php
namespace App\Service\Skill;

use App\Repository\Skill\SkillRepository;

class SkillService
{
    private $skillRepository;

    public function __construct(SkillRepository $skillRepository)
    {
        $this->skillRepository = $skillRepository;
    }

    public function getAllSkill()
    {
        $rawData = $this->skillRepository->getAllSkill();
        return $this->refactorDataSkill($rawData);
    }

    public function refactorDataSkill($rawData)
    {
        $rawDataNew = [];
        foreach ($rawData as $key => $item){
            $rawDataNew[] = [
                'id' => $key,
                'value' => $item
            ];
        }
        return $rawDataNew;
    }
}