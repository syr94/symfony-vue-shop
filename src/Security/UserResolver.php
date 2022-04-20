<?php


namespace App\Security;

use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

final class UserResolver
{
    private TokenStorageInterface $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @trows NoCurrentUserException
     */
    public function getCurrentUser(): User
    {
        $token = $this->tokenStorage->getToken();
        $user = $token !== null ? $token->getUser() : null;

        if (!($user instanceof User))
        {
            throw new NoCurrentUserException;
        }

        return $user;
    }
}