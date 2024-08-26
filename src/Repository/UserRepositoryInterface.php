<?php

namespace App\Repository;

use App\Entity\User;

class UserRepository implements UserRepositoryInterface
{
    private array $users = [];

    public function save(User $user): void
    {
        $this->users[$user->getId()] = $user;
    }

    public function update(User $user): void
    {
        if (isset($this->users[$user->getId()])) {
            $this->users[$user->getId()] = $user;
            $user->setUpdatedAt();
        } else {
            throw new \Exception('User not found.');
        }
    }

    public function delete(User $user): void
    {
        if (isset($this->users[$user->getId()])) {
            unset($this->users[$user->getId()]);
        } else {
            throw new \Exception('User not found.');
        }
    }

    public function findById(string $id): ?User
    {
        return $this->users[$id] ?? null;
    }

    public function findByEmail(string $email): ?User
    {
        foreach ($this->users as $user) {
            if ($user->getEmail() === $email) {
                return $user;
            }
        }
        return null;
    }
}
