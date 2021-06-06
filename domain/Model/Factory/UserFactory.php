<?php

declare(strict_types=1);

namespace Domain\Model\Factory;

use Domain\Model\Entity\Profile;
use Domain\Model\Entity\User;
use Domain\Model\ValueObject\UserId;
use Domain\Model\ValueObject\UserName;

class UserFactory
{
    public static function create(int $id, string $name, ?Profile $profile): User
    {
        return new User(
            new UserId($id),
            new UserName($name),
            $profile
        );
    }
}
