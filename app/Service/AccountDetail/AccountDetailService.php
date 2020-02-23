<?php
 namespace App\Service\AccountDetail;

use App\Repository\AccountDetail\AccountDetailRepository;

class AccountDetailService
{
    private $accountDetailRepository;
  public function __construct(AccountDetailRepository $accountDetailRepository)
  {
      $this->accountDetailRepository = $accountDetailRepository;
  }
  public function detail()
  {
     return $this->accountDetailRepository->detail();
  }
}
