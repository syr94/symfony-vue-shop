<?php
namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;


class  UserService
{
    private UserRepository $userRepository;

    public function createNewUser(User $user)
    {
        $this->userRepository->add($user);
    }
}