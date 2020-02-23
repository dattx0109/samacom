<?php
namespace App\Service\AccountWish;

use App\Repository\AccountWish\AccountWishRepository;

class AccountWishService
{
    private $accountWishRepository;

    public function __construct(AccountWishRepository $accountWishRepository)
    {
        $this->accountWishRepository = $accountWishRepository;
    }

    public function insertAndUpdate($dataRaw)
    {
        $this->accountWishRepository->insertAndUpdate($dataRaw);
    }

    public function getData()
    {
        return $this->accountWishRepository->getDataAccountWish();
    }
}
