<?php

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\ArtistBloodType;
use Domain\Model\ValueObject\UserPassword;

class User
{
    private $id;
    private $name;
    private $email;
    private $emailVerifiedAt;
    private $password;
    private $rememberToken;
    private $createdAt;
    private $updatedAt;

    public function __construct(UserId $id, UserName $name, UserEmail $email, timestamp $emailVerifiedAt, UserPassword $password, UserRememberToken $rememberToken, timestamp $createdAt, timestamp $updatedAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->emailVerifiedAt = $emailVerifiedAt;
        $this->password = $password;
        $this->rememberToken = $rememberToken;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }
}
