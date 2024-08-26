<?php

namespace App\UseCase;

use App\DTO\UserRequestDTO;
use App\Entity\User;
use App\Repository\UserRepositoryInterface;

class SaveUserUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(UserRequestDTO $request): User
    {
        $user = new User(
            $request->first_name,
            $request->last_name,
            $request->alias,
            $request->email,
            $request->password,
            $request->status
        );

        $this->userRepository->save($user);

        return $user;
    }
}
