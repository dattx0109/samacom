<?php

namespace App\Service\AccountSkill;

use App\Repository\AccountSkill\AccountSkillRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class AccountSkillService
{
    private $accountSkillRepository;

    public function __construct(AccountSkillRepository $accountSkillRepository)
    {
        $this->accountSkillRepository = $accountSkillRepository;
    }

    /**
     * @param $dataRaw
     * @return int
     */
    public function insert($dataRaw)
    {
        $dataInsert = [
            'account_id' => request()->user->id,
            'skill_id'   => $dataRaw['skill_id'],
            'point'      => $dataRaw['point'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        return $this->accountSkillRepository->insert($dataInsert);
    }
    public function delete($id)
    {
        $this->accountSkillRepository->delete($id);
    }

    public function getSkill()
    {
      return  $this->accountSkillRepository->getSkill();

    }

    public function getSkillByAccountSkillId($id)
    {
        return $this->accountSkillRepository->getSkillByAccountSkillId($id);
    }
    /**
     * @param $dataCheck
     * @param null $id
     * @return bool
     */
    public function checkSkillAccount($dataCheck, $id = null)
    {
        return $this->accountSkillRepository->checkUniqueSkillAccount($dataCheck, $id);
    }

    /**
     * @param $id
     * @return Model|Builder|object|null
     */
    public function getDetailAccountSkillById($id)
    {
        return $this->accountSkillRepository->getDetailSkillAccount($id);
    }

    /**
     * @param $id
     * @param $dataRequest
     */
    public function updateAccountSkill($id, $dataRequest)
    {
        DB::beginTransaction();
        try {
            $dataUpdate = [
                'skill_id' => $dataRequest['skill_id'],
                'point' => $dataRequest['point'],
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $this->accountSkillRepository->updateAccountSkill($id, $dataUpdate);
            DB::commit();
            return;
        } catch (\Exception $e) {
            DB::rollBack();
        }

    }
}
