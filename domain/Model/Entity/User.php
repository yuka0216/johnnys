<?php

namespace Domain\Model\Entity;

use Domain\Model\ValueObject\UserId;
use Domain\Model\ValueObject\UserName;
use Domain\Model\Entity\Profile;

class User
{
    private $id;
    private $name;
    private $profile;

    public function __construct(UserId $id, UserName $name, ?Profile $profile)
    {
        $this->id = $id;
        $this->name = $name;
        $this->profile = $profile;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function profile(): ?Profile
    {
        return $this->profile;
    }
}
