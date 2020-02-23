<?php


namespace App\Service\File;


use App\Repository\File\FileRepository;

class FileService
{
    private $fileRepository;

    public function __construct(FileRepository $fileRepository)
    {
        $this->fileRepository = $fileRepository;
    }

    public function insertDB($rawData)
    {
        return $this->fileRepository->insert($rawData);
    }

    public function updateDb($rawData, $fileId)
    {
        return $this->fileRepository->update($rawData, $fileId);
    }
}
