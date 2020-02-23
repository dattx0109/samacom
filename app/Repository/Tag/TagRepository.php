<?php

namespace App\Repository\Tag;

use Illuminate\Support\Facades\DB;

class TagRepository
{
    const TABLE_NAME = 'tags';

    public function getListJobTag($dataSearch)
    {

        $listJobTag = DB::table(self::TABLE_NAME);
            if (isset($dataSearch['group_sale'])) {
                $listJobTag->whereIn('tag_id', $dataSearch['group_sale']);
            }
       $listJobTag = $listJobTag->get();
            return $listJobTag;
    }
}
