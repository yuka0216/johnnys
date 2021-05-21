<?php

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\UserId;
use Domain\Model\ValueObject\UserName;

class User
{
    private $id;
    private $name;

    public function __construct(UserId $id, UserName $name)
    {
        $this->id = $id;
        $this->name = $name;
        // $this->email = $email;
        // $this->emailVerifiedAt = $emailVerifiedAt;
        // $this->password = $password;
        // $this->rememberToken = $rememberToken;
        // $this->createdAt = $createdAt;
        // $this->updatedAt = $updatedAt;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }
}
