<?php

declare(strict_types=1);

namespace App\Adapter\Repository;

use App\User as UserModel;
use Domain\Model\Entity\User;
use Domain\Model\ValueObject\UserId;
use Domain\Model\ValueObject\UserName;
use Domain\Service\Repository\UserRepositoryInterface;

final class UserRepository implements UserRepositoryInterface
{
    private $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function findAll(): array
    {
        $users = $this->userModel->all();
        $userEntities = [];
        foreach ($users as $user) {
            $userEntities[] = new User(
                new UserId($user->id),
                new UserName($user->name),
            );
        }

        return $userEntities;
    }
}
