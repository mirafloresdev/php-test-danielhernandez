<?php

namespace App\Entity;

class User
{
    private string $id;

    private string $alias;
    private string $first_name;
    private string $last_name;

    private string $status;

    private string $email;
    private string $password;

    private \DateTime $createdAt;
    private \DateTime $updatedAt;


    public function __construct(string $first_name,
                                string $last_name,
                                string $alias,
                                string $email,
                                string $password,
                                string $status = 'active',

    )
    {
        $this->id = uniqid('', true);
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->alias = $alias;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->status = $status;

    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function setFirstName(string $first_name): void
    {
        $this->first_name= $first_name;
    }

    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    public function getAlias(): string
    {
        return $this->alias;
    }



    public function setAlias(string $alias): void
    {
        $this->alias = $alias;
    }



    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(): void
    {
        $this->updatedAt = new \DateTime();
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}