<?php
namespace App\Service\Login;

use App\Repository\User\UserRepository;

class LoginService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function findPhoneByPhone($phone)
    {
        return $this->userRepository->findPhoneByPhone($phone);
    }

    public function getUserByPhone($phone)
    {
        return $this->userRepository->getUserByPhone($phone);
    }
}
