<?php

declare(strict_types=1);

namespace App\Adapter\Repository;

use App\User as UserModel;
use Domain\Service\Repository\UserRepositoryInterface;

final class UserRepository implements UserRepositoryInterface
{
    private $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }
}
