<?php

namespace App\Service\Province;

use App\Repository\Province\CreateRepository;

class CreateService
{
    private $createRepository;

    public function __construct(CreateRepository $createRepository)
    {
        $this->createRepository = $createRepository;
    }

    public function insert($dataInserts)
    {
        $arrDataInsert = [];
        foreach ($dataInserts as $item) {
            array_push($arrDataInsert, [
                    'name' => $item[1],
                    'type' => ($item[2] == 'Tỉnh' ? 2 : 1),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]

            );
        }
        $this->createRepository->insert($arrDataInsert);
    }
}
