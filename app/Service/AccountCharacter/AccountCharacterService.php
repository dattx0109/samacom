<?php
namespace App\Service\AccountCharacter;

use App\Repository\Account\AccountCharacterRepository;

class AccountCharacterService
{
    private $accountCharacterRepository;

    public function __construct(AccountCharacterRepository $accountCharacterRepository)
    {
        $this->accountCharacterRepository = $accountCharacterRepository;
    }

    public function insertAccountCharacter()
    {
//        dd(request(0));
//        foreach (request(0) as $item)
        $accountId = request('user')->id;
        $data = ($this->refactorRawData(request(0), $accountId));
        $this->accountCharacterRepository->deleteAccountCharacterByAccountId($accountId);
        $this->accountCharacterRepository->insert($data);
    }

    public function refactorRawData($rawData, $id)
    {
        $rawDataId = [];
        foreach ($rawData as $item){
            $rawDataId[] =[
                'character_id' =>$item['id'],
                'account_id' => $id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

        }
        return $rawDataId;
    }

    public function getCharacterByAccountCharacterId()
    {
        $id = request('user')->id;
        return $this->accountCharacterRepository->getDataAccountCharacterByAccountId($id);
    }

    public function deleteAccountCharacter($id)
    {
        $this->accountCharacterRepository->deleteAccountCharacter($id);
    }
}
