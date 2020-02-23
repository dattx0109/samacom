<?php

namespace App\Repository\FileDownloadLog;

use Illuminate\Support\Facades\DB;

class FileDownloadLogRepository
{
    const TABLE_NAME = 'file_download_log';

    public function insert($rawData)
    {
        return DB::table(self::TABLE_NAME)->insert($rawData);
    }
}