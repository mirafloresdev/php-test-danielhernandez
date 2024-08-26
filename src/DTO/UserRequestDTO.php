<?php

namespace App\DTO;

class UserRequestDTO
{
    public string $first_name;
    public string $last_name;
    public string $alias;
    public string $email;
    public string $password;
    public string $status;

    public function __construct(
        string $first_name,
        string $last_name,
        string $alias,
        string $email,
        string $password,
        string $status = 'active'
    ) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->alias = $alias;
        $this->email = $email;
        $this->password = $password;
        $this->status = $status;
    }
}
