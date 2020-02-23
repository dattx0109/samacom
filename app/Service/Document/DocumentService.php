<?php
namespace App\Service\Document;

use App\Repository\FileDownloadLog\FileDownloadLogRepository;
use Illuminate\Support\Facades\Storage;

class DocumentService
{
    private $downloadLogRepository;

    public function __construct(FileDownloadLogRepository $downloadLogRepository)
    {
        $this->downloadLogRepository = $downloadLogRepository;
    }

    public function getAllFile()
    {
        $rawData = [];
        $files = Storage::files('file');
        foreach ($files as $item){
            $value = [];
            $value['link'] = $item;
            $value['value'] = explode('/', $item)[1];
            $value['size'] =  $this->convertSizeUnit(Storage::size($item));

            $rawData[] = $value;
        }
        return $rawData;
    }

    public function storeUserDownload($rawData)
    {
        return $this->downloadLogRepository->insert($rawData);
    }

    public function convertSizeUnit($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}